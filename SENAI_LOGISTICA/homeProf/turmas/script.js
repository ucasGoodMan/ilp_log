function openModal() {
  document.getElementById('modal').style.display = 'flex';
}

function closeModal() {
  document.getElementById('modal').style.display = 'none';
  document.getElementById('formulario').reset();
  document.getElementById('id').value = ''; // Limpar ID
}

function editTurma(id, nturma, nometurma, qntalunos) {
  document.getElementById('id').value = id;
  document.getElementById('nturma').value = nturma;
  document.getElementById('nometurma').value = nometurma;
  document.getElementById('qntalunos').value = qntalunos;
  openModal();
}

function deleteTurma(id) {
  if (confirm("Tem certeza que deseja excluir esta turma?")) {
      window.location.href = `delete.php?id=${id}`;
  }
}
