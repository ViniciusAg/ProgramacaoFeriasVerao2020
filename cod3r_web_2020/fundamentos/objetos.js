//Criação de objetos em JS
let meuObjeto = {}

console.log(meuObjeto)

meuObjeto.valor = 89
meuObjeto.teste = "Ola Mundo"

console.log(meuObjeto)

meuObjeto.novoObj = {novoValor : 300, teste2 : "String"}

meuObjeto.resultado = meuObjeto.novoObj.novoValor + meuObjeto.valor

console.log(meuObjeto.novoObj.teste2)
console.log(meuObjeto)

//Outra forma de acessar os atributos, sem o operador ponto
meuObjeto["valor"] = 30
console.log(meuObjeto)