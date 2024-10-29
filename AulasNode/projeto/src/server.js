const http = require('http');
 
const hostname= '192.168.56.1';
const port = 3000;
 
const server = http.createServer((req, res) => {
    res.statusCode = 200;
    res.setHeader('Content-type', 'text/plain');
    res.end('<strong>ufgnf</strong>\n');
});
 
server. listen(port,hostname, () => {
    console.log(`Server running at https://${hostname}:${port}/`);
});