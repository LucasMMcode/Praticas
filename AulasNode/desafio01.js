var readlineSync = require('readline-sync');
var precoCombutivel = parseFloat(readlineSync.question('Custo:'));
var KmPorLitros = parseFloat(readlineSync.question('Km/l:'));
var distanciaEmKm = parseFloat(readlineSync.question('KM:'));
var liitrosConsumidos = distanciaEmKm / KmPorLitros;
var valorGasto = liitrosConsumidos * precoCombutivel;
console.log(valorGasto.toFixed(2));