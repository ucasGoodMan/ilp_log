<!DOCTYPE html>
<html>
<head>
<title>Recebimento Aluno</title>
<!--<style>
body {
  font-family: sans-serif;
}
table {
  border-collapse: collapse;
  width: 100%;
}
th, td {
  text-align: left;
  padding: 8px;
}
th {
  background-color: #f2f2f2;
}
tr:nth-child(even) {
  background-color: #f2f2f2;
}
.button {
  background-color: rgb(37, 91, 168); /* Azul */
  border: none;
  color: white;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 4px;
}
.button:hover {
  background-color: rgb(27, 71, 148); /* Azul escuro */
}
.input {
  border: 1px solid #ccc;
  padding: 8px;
  border-radius: 4px;
  font-size: 14px;
}
.checkbox {
  padding: 8px;
  font-size: 14px;
}
.checkbox input {
  margin-right: 5px;
}
</style>-->
</head>
<body>

<h2>RECEBIMENTO ALUNO</h2>

<table>
  <tr>
    <th>Nota fiscal</th>
    <td><input type="text" class="input" placeholder="123456"></td>
    <td rowspan="4"><button class="button">OK</button></td>
  </tr>
  <tr>
    <th>Pedido de compra</th>
    <td><input type="text" class="input" placeholder="2323"></td>
  </tr>
  <tr>
    <th>Doca</th>
    <td><input type="text" class="input" placeholder="1"></td>
  </tr>
  <tr>
    <th>Sem pedido</th>
    <td><button class="button">OK</button></td>
  </tr>
</table>

<h3>PRODUTOS</h3>

<table>
  
  <tr>
    <th>UN</th>
    <th>QTD</th>
    <th>R$/UNIT</th>
    <th>R$ TOTAL</th>
  </tr>
  <tr>
    <td><input type="text" class="input" placeholder="UN"></td>
    <td><input type="text" class="input" placeholder="5"></td>
    <td><input type="text" class="input" placeholder="R$5,50"></td>
    <td><input type="text" class="input" placeholder="R$27,50"></td>
  </tr>
</table>

<div class="checkbox">
  <input type="checkbox" > Faltando?
</div>

<div class="checkbox">
  <input type="checkbox" > Avariado?
</div>

<button class="button">OK</button>

</body>
</html>