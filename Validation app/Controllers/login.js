const express 		= require('express');
const session 		= require('express-session');
const userModel		= require.main.require('./models/userModel');
const router 		= express.Router();

router.get('/', (req, res)=>{
	var err = {
		err_msg : req.session.errmsg
	};
	res.render('login/index',err);
});

router.post('/', (req, res)=>{

	var user = {
		username: req.body.username,
		password: req.body.password
	};

	userModel.validate(user, function(status){
		console.log(status);
		if(status.length > 0 ){
			res.cookie('uid', status[0].id);
			res.cookie('uname',status[0].username);
			res.cookie('type',status[0].type);
			req.session.uid = status[0].id;
			req.session.uname = status[0].username;
			req.session.type = status[0].type;
			if(status[0].type == 0){
				res.redirect('/entity/allPendingEntity');
			}
		}
		else{
			req.session.errmsg = "UserName or Password is not right";
			res.redirect('/login');
		}
		
	});
});

module.exports = router;