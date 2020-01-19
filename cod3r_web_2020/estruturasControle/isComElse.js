//Estrutura de controle if/else

function testeCompleto(nota){
    if(nota >= 6){
        console.log("Aprovado com ", nota)
    } else {
        console.log("Faltou ", 6-nota)
    }
}

testeCompleto(4)
testeCompleto(6)