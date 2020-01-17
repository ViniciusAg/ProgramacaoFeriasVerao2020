//Utilização de funções
function minhaFuncao(){
    console.log("Ola Mundo!")
}

//Chama a minhaFuncao() duas vezes
minhaFuncao()
minhaFuncao()

//Criação de funções que recebem parâmetros
function imprimirSoma(a,b){
    console.log(a+b)
}

imprimirSoma(4,6)
imprimirSoma(4,3.5)
imprimirSoma('a', ' aqui')
//Se for necessário, alguns dos parâmetros podem receber apenas alguns de seus parâmetros ou mais que os esperados
imprimirSoma(5) //Vai devolver NaN - Not a Number

function novoTeste(valor){
    return valor*valor
}

console.log(novoTeste(3))