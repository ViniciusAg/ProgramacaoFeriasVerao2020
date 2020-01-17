//Retorno compatível com ECMA2015

function validacao(valor1, valor2){
    const v1 = valor1 && valor2
    const v2 = valor1 || valor2
    const v3 = valor1 != valor2
    const v4 = !valor1
    return {v1, v2, v3, v4}
}

console.log(validacao(true, false))