//Variáveis do tipo Array
//Organiza os valores de forma linear, como um vetor.
const meuArray = [4.3 , 4.5, 5, 6, "Teste"]

console.log(meuArray[1])
console.log(meuArray[0])
//Quando um valor de uma posição que não existe tentar ser acessada, nenhum erro é lançado
console.log(meuArray[500])
//Os valores de dentro do array podem ser alterados
meuArray[0] = 13
console.log(meuArray[0])

//Verificar o tamanho do array
console.log(meuArray.length)

//Adicionando mais um elemento ao array
meuArray.push("Novo valor inserido")
console.log(meuArray.length)

//Para retirar um valor do array (o último valor), utilizar o método pop() ou delete(indice)
console.log(meuArray.pop())
console.log(meuArray.length)