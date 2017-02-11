var express = require('express');
var app = express();

var bodyParser = require('body-parser');

app.use( bodyParser.json() );       // to support JSON-encoded bodies

app.use( bodyParser.urlencoded() ); // to support URL-encoded bodies

app.use('/', express.static(__dirname + '/public'));

var nodemailer = require('nodemailer');
 
var transporter = nodemailer.createTransport({
    service: 'Gmail',
    auth: {
        user: 'naeluh',
        pass: 'bxnaejxinsxrpdyu'
    }
});

app.post('/contact', function(req, res) {
	        var n = req.body.name;
            var c = req.body.email;
            var p = req.body.phone;
            var m = req.body.message;

            var mailOptions = {
                from: 'YourName <naeluh@gmail.com>', // sender address
                to: 'naeluh@gmail.com', // list of receivers. This is whoever you want to get the email when someone hits submit
                subject: 'New email from your website contact form', // Subject line
 				text: ' name: ' + n +' email: ' + c + ' phone: ' + p + ' message: ' + m
            };
 
            transporter.sendMail(mailOptions, function (error, info) {
                if (error) {
                    console.log(error);
                } else {
                    console.log('Message sent: ' + info.response);
                }
            });

            res.send("Thanks! We have sent your message.");

    });
 
app.listen(8081, function() { console.log('listening')});