//declaration
const express 			= require('express');
const bodyParser 		= require('body-parser');
const exSession 		= require('express-session');
const cookieParser 		= require('cookie-parser');
const login				= require('./controllers/login');
const logout			= require('./Controllers/logout');
const entity			= require('./Controllers/entity');
const app				= express();
const port				= 9000;

//configuration
app.set('view engine', 'ejs');

//middleware
app.use('/assets', express.static('assets'));
app.use(bodyParser.urlencoded({extended: true}));
app.use(cookieParser());
app.use(exSession({secret: 'secret value', saveUninitialized: true, resave: false}));

app.use('/login', login);
app.use('/logout',logout);
app.use('/entity', entity);

//router
app.get('/', (req, res)=>{
	res.render("login/index");
});

//server startup
app.listen(port, (error)=>{
	console.log('server strated at '+port);
});