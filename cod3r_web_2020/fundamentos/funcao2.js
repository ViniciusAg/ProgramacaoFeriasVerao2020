//Atribuição de funções para variáveis
const minhaVariavelParaFuncao = function (a,b){
    console.log(a+b)
}

//Uso da função arrow
const minhaVariavelComFuncaoComArrow = (a,b) => {
    return a+b
}

//Uso do arrow com retorno implicito - funções com uma única sentença
const minhaVariavelComRetorno = (a,b) => a-b

minhaVariavelParaFuncao(3,4)
console.log(minhaVariavelComFuncaoComArrow(4,5))
console.log(minhaVariavelComRetorno(3,2))

