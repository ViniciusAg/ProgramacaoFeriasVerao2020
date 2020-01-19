//Uso da estrutura switch
const imprimirResultado = (nota) => {
    switch(Math.floor(nota)){
        case 10:
        case 9:
            console.log("Honra!")
            break
        case 8:
        case 7:
            console.log("Aprovado!")
            break
        case 6:
        case 5:
            console.log("Recuperação")
            break
        case 4:
        case 3:
        case 2:
        case 1:
        case 0:
            console.log("Reprovado")
            break
        default:
            console.log("Invalido")

    }
}

imprimirResultado(9)
imprimirResultado(-5.6)
imprimirResultado(4)

const teste = (x) => {
    switch(x){
        case "Murilo":
            console.log("Funciona com strings")
            break
        case "Sair":
            console.log("Teste")
            break
    }
}

teste("Murilo")
teste("Outro")
teste("Sair")