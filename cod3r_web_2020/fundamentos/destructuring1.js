//Introduzido no JS 2015 (ECMA2015)
//Instancia de um objeto
const pessoa = {
    nome: "Ana",
    idade: 5,
    endereco: {
        logradouro: "Rua Alegre",
        numero: 514
    }
}

//Forma padrão para pegar os valores dos atributos
const nomeVariavel = pessoa.nome

//Forma com o operador destructuring
const {nome, idade} = pessoa
console.log(nome, idade)

//Outro nome pode ser dado ao atributo
const {nome: meuNome, idade :nomeDaIdade } = pessoa
console.log(meuNome, nomeDaIdade)

//Tentativa de retirar atributos que não são existentes
const {sobrenome, teste = true} = pessoa
console.log(sobrenome, teste)

//Desestruração aninhado
const {endereco : {logradouro, numero, cep = null}} = pessoa
console.log(logradouro, numero, cep)