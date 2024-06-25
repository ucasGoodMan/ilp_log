const modal = document.querySelector('.modal-container');
const tbody = document.querySelector('tbody');
const sNome = document.querySelector('#id');
const sFuncao = document.querySelector('#nometurma');
const sSalario = document.querySelector('#qntalunos');
const btnSalvar = document.querySelector('#botao');

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
    sNome.value = itens[index].nome;
    sFuncao.value = itens[index].funcao;
    sSalario.value = itens[index].salario;
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
    <td>${item.nome}</td>
    <td>${item.funcao}</td>
    <td>${item.salario}</td>
    <td class="acao">
      <button onclick="editItem(${index})"><i class='bx bx-edit'></i></button>
    </td>
    <td class="acao">
      <button onclick="deleteItem(${index})"><i class='bx bx-trash'></i></button>
    </td>
  `;
  tbody.appendChild(tr);
}

btnSalvar.onclick = async e => {
  if (sNome.value === '' || sFuncao.value === '' || sSalario.value === '') {
    return;
  }

  e.preventDefault();

  if (id !== undefined) {
    itens[id].nome = sNome.value;
    itens[id].funcao = sFuncao.value;
    itens[id].salario = sSalario.value;
  } else {
    itens.push({ 'nome': sNome.value, 'funcao': sFuncao.value, 'salario': sSalario.value });
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
        'Content-Type': 'application/json'
      }
    });
    if (!response.ok) {
      throw new Error('Erro ao buscar itens do banco de dados');
    }
    const data = await response.json();
    return data;
  } catch (error) {
    console.error('Erro ao buscar itens do banco de dados:', error);
    throw error; // Propaga o erro para o chamador de getItensBD
  }
};

const setItensBD = async (itens) => {
  try {
    const response = await fetch('itens.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(itens)
    });
    if (!response.ok) {
      throw new Error('Erro ao salvar itens no banco de dados');
    }
    const data = await response.json();
    return data;
  } catch (error) {
    console.error('Erro ao salvar itens no banco de dados:', error);
    throw error; // Propaga o erro para o chamador de setItensBD
  }
};

loadItens();
