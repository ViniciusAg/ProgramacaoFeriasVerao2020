//Variáveis declaradas com var fora de funções, tem escopo global
{{{{ var testeGlobal = 3}}}}

console.log(testeGlobal)

//declara variável com escopo de funcao
function teste() {
    var localFuncao = 4
}
//Vai gerar erro.
console.log(localFuncao)




