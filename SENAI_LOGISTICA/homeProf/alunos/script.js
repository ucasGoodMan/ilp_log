const modal = document.querySelector('.modal-container');
const tbody = document.querySelector('tbody');
const sNome = document.querySelector('#nturma');
const sFuncao = document.querySelector('#nometurma');
const sSalario = document.querySelector('#qntalunos');
const btnSalvar = document.querySelector('#botao');
const form = document.getElementById('formulario');

let itens = [];
let id;

function openModal(edit = false, index = 0) {
  modal.classList.add('active');

  modal.onclick = e => {
    if (e.target.className.indexOf('modal-container') !== -1) {
      modal.classList.remove('active');
    }
  };

  if (edit) {
    sNome.value = itens[index].nturma;
    sFuncao.value = itens[index].nometurma;
    sSalario.value = itens[index].qntalunos;
    id = index;
  } else {
    sNome.value = '';
    sFuncao.value = '';
    sSalario.value = '';
  }
}

function editItem(index) {
  openModal(true, index);
}

async function deleteItem(index) {
  itens.splice(index, 1);
  await setItensBD(itens);
  loadItens();
}

function insertItem(item, index) {
  let tr = document.createElement('tr');

  tr.innerHTML = `
    <td>${item.nturma}</td>
    <td>${item.nometurma}</td>
    <td>${item.qntalunos}</td>
    <td class="acao">
      <button onclick="editItem(${index})"><i class='bx bx-edit'></i></button>
    </td>
    <td class="acao">
      <button onclick="deleteItem(${index})"><i class='bx bx-trash'></i></button>
    </td>
  `;
  tbody.appendChild(tr);
}

form.onsubmit = async e => {
  e.preventDefault();
  if (sNome.value === '' || sFuncao.value === '' || sSalario.value === '') {
    return;
  }

  if (id !== undefined) {
    itens[id].nturma = sNome.value;
    itens[id].nometurma = sFuncao.value;
    itens[id].qntalunos = sSalario.value;
  } else {
    itens.push({ 'nturma': sNome.value, 'nometurma': sFuncao.value, 'qntalunos': sSalario.value });
  }

  await setItensBD(itens);

  modal.classList.remove('active');
  loadItens();
  id = undefined;
};

async function loadItens() {
  try {
    itens = await getItensBD();
    tbody.innerHTML = '';
    itens.forEach((item, index) => {
      insertItem(item, index);
    });
  } catch (error) {
    console.error('Erro ao carregar itens:', error);
    tbody.innerHTML = '<tr><td colspan="5">Erro ao carregar itens.</td></tr>';
  }
}

const getItensBD = async () => {
  try {
    const response = await fetch('itens.php', {
      method: 'GET',
      headers: {
        'Content-Type': 'text/xml'
      }
    });
    if (!response.ok) {
      throw new Error('Erro ao buscar itens do banco de dados');
    }
    const xmlText = await response.text();
    const parser = new DOMParser();
    const xml = parser.parseFromString(xmlText, "text/xml");
    const turmas = xml.getElementsByTagName('turma');
    let itens = [];
    for (let i = 0; i < turmas.length; i++) {
      const turma = turmas[i];
      itens.push({
        nturma: turma.getElementsByTagName('nturma')[0].textContent,
        nometurma: turma.getElementsByTagName('nometurma')[0].textContent,
        qntalunos: turma.getElementsByTagName('qntalunos')[0].textContent
      });
    }
    return itens;
  } catch (error) {
    console.error('Erro ao buscar itens do banco de dados:', error);
    throw error;
  }
};

const setItensBD = async (itens) => {
  try {
    let xmlString = '<?xml version="1.0"?><turmas>';
    itens.forEach(item => {
      xmlString += `<turma>
                      <nturma>${item.nturma}</nturma>
                      <nometurma>${item.nometurma}</nometurma>
                      <qntalunos>${item.qntalunos}</qntalunos>
                    </turma>`;
    });
    xmlString += '</turmas>';

    const response = await fetch('itens.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'text/xml'
      },
      body: xmlString
    });
    if (!response.ok) {
      throw new Error('Erro ao salvar itens no banco de dados');
    }
    const xmlText = await response.text();
    const parser = new DOMParser();
    const xml = parser.parseFromString(xmlText, "text/xml");
    return xml;
  } catch (error) {
    console.error('Erro ao salvar itens no banco de dados:', error);
    throw error;
  }
};

loadItens();
