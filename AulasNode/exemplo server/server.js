const http = require('http');
http.createServer((req,res) => { 
    res.writeHead(200,{'Content-Type':'text/plain'});
    let url = req.url;
    if(url==='/' || url==='/index'){
        res.write('Home Page');
    } else if(url ==='/about'){
        res.write('About Page');
    }else if(url ==='/contact'){
        res.write('Contact Page');
    }else {
        res.write('404 Not Found');
    }
    res.end();
}).listen (3000,()=>{
    console.log('Server running on http://localhost:3000');
});