//JS é bastante flexível, mas tomar cuidado com isso.
//Utilizando Template Strings

const nome = "Murilo"

//Operações de concatenação
const concatenacao = nome.concat(" Zanini")

const concatenacao_2 = concatenacao + " de Carvalho"

console.log(concatenacao_2)

//Template String com crase `

const exemploTemplate = `Teste de Entrada: ${concatenacao} e também ${concatenacao_2}`
console.log(exemploTemplate)

//Função para converter texto para letras maiúsculas
const up = texto => texto.toUpperCase()
//Uso de Template String com chamada de funções dentro dela
console.log(`Exemplo de Chamada de Função com Template String: ${up(exemploTemplate)}`)

//Definição de valor padrão
let nomeNovo
console.log(nomeNovo || "Valor Padrão")