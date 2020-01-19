//Uso de estruturas if combinadas
//Adiciona um método para a classe Number
Number.prototype.entre = function(inicio, fim){
    return this >= inicio && this <= fim
}

function avaliaNota(nota){
    if(nota.entre(9,10)){
        console.log("Honra!")
    } else if(nota.entre(7,8)){
        console.log("Aprovado")
    } else if(nota.entre(5,6)){
        console.log("Recuperação")
    } else if(nota.entre(0,4)){
        console.log("Reprovado")
    } else {
        console.log("Valor Inválido")
    }
}

avaliaNota(10)
avaliaNota(-8)
avaliaNota(5)