//Função para gerar números inteiros aleatórios
const getNumeroInteiroRandom = (min = 0, max = 10) => {
    return Math.round(Math.random() * (max - min) + min)
}

let valor = getNumeroInteiroRandom(0,10)

while (valor){
    //Interpolação de string
    console.log(`Valor sorteado: ${valor}`)
    valor = getNumeroInteiroRandom(0,10)
}

console.log("Fim!")