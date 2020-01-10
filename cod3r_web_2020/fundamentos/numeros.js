//Operações com valores numéricos em JS
//Valores ponto flutuante e inteiros, em JS, são do tipo number
const peso1 = 1.5
const peso2 = 3

console.log(peso1, peso2)
//Para verificar se o valor das variáveis é de um tipo
console.log(Number.isInteger(peso1))
console.log(Number.isInteger(peso2))

//Cuidado, se algum valor como 4.0 for atribuído a uma variável, ele será tratado como um valor inteiro
console.log(Number.isInteger(4.0))

//Para controlar a quantidade de casas decimais, utilizar o método toFixed(numeroCasas)
const media = (4 * peso1 + 6 * peso2) / (peso1+peso2)
console.log(media.toFixed(3))

//Number é uma função, já number (com n minusculo) é um tipo de dado.
//Operações que resultam infinito, geram valores que resultam em Infinity
const base = 10
const area = 2 * Math.PI * Math.pow(base,2)
console.log(area.toFixed(2))