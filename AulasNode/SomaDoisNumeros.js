var readlineSync = require('readline-sync');
var valor1 = 0;
var valor2 = 0;
var total = 0;


console.log('Prograna que soma dois nueros');
valor1 = parseFloat(readlineSync.question('ValorA:'));
valor2 = parseFloat(readlineSync.question('ValorB:'));
total = valor1 + valor2;
console.log(valor1 + " + " + valor2 + " = " + total);
total = valor1 - valor2;
console.log(valor1 + " - " + valor2 + " = " + total);
total = valor1 * valor2;
console.log(valor1 + " X " + valor2 + " = " + total);
total = valor1 / valor2;
console.log(valor1 + " / " + valor2 + " = " + total);
total = valor1 ** valor2;
console.log(valor1 + " ^ " + valor2 + " = " + total);
total = valor1 % valor2;
console.log(valor1 + " % " + valor2 + " = " + total);