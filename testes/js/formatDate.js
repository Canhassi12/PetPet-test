// Escreva uma função que converta a data de entrada do usuário formatada como MM/DD/YYYY em um formato exigido por uma API (YYYYMMDD). O parâmetro "userDate" e o valor de retorno são strings.

// Por exemplo, ele deve converter a data de entrada do usuário "31/12/2014" em "20141231" adequada para a API.

function formatDate(userDate) {
    
    let initialDate = userDate.split("/");

    let day = initialDate[0];
    let month = initialDate[1];
    let year = initialDate[2];
    
    return `${year}${day}${month}`;
}

console.log(formatDate("12/31/2014"));
