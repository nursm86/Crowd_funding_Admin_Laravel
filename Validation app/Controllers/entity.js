const express 		= require('express');
const session 		= require('express-session');
const router 		= express.Router();
const userModel		= require.main.require('./models/userModel');
const fs			= require('fs');

router.post('/pendingEntity',(req,res)=>{
    var obj = {
        id: req.body.id,
        username: req.body.username,
        password: req.body.pass,
        name: req.body.name,
        email: req.body.email,
        phone: req.body.phone,
        address: req.body.address,
        type: 0,
        status: 1,
        vote: 0,
        image: req.body.image,
        sq: req.body.sq,
        ct: req.body.ct,
        cb: req.body.cb,
        votedUser: [
            
        ]
    };
    var data=fs.readFileSync('./assets/json/pending_entity.json', 'utf8');
    var entitylist=JSON.parse(data);
    entitylist.push(obj);
    fs.writeFile("./assets/json/pending_entity.json", JSON.stringify(entitylist, null, 2), (err) => {
        if (err) {
            console.error(err);
            res.json({flag :true});
        }
        res.json({flag :true});
    });
});

router.get('/allPendingEntity', (req, res)=>{
    var data=fs.readFileSync('./assets/json/pending_entity.json', 'utf8');
    var entitylist=JSON.parse(data);
    entitylist.forEach(function(item,index){
        item.votedUser.forEach(function(user){
            if(user.userName == req.cookies['uname']){
                delete entitylist[index];
                return;
            }
        });
    });
	// 	var entitylist = [];
	// 	list.forEach(function(entity){
	// 		entitylist.push([user.email,user.otp]);
	// 	});
	// 	var flag = false;
	// 	var userobj = [];
	// 	userlist.forEach(function(user){
	// 		if(req.params.email != user[0]){
	// 			userobj.push({
	// 				email : user[0],
	// 				otp : user[1]
	// 			});
	// 		}
	// 		if(req.params.email == user[0] && entitylist[i].otp == user[1]){
	// 			flag = true;
	// 		}
    //     });
        
    //     fs.writeFile("./assets/json/otp.json", JSON.stringify(userobj, null, 2), (err) => {
    //         if (err) {
    //             console.error(err);
    //             return;
    //         }
    //     });
    // var entitie ="";
	res.render('Entity/allpendingEntity',{entities : entitylist});
});

router.get('/updateEntity/:id', (req, res)=>{
    var id = req.params.id;
    var data=fs.readFileSync('./assets/json/pending_entity.json', 'utf8');
    var entitylist=JSON.parse(data);
    var entity;
    entitylist.forEach(function(item){
        if(item.id == id){
            entity = item;
            return;
        }
    });
    
    res.render('Entity/updateEntity',entity);
});

router.get('/approve/:id', (req, res)=>{
    var id = req.params.id;
    var data=fs.readFileSync('./assets/json/pending_entity.json', 'utf8');
    var entitylist=JSON.parse(data);
    var vote;
    var i;
    entitylist.forEach(function(item,index){
        if(item.id == id){
            item.votedUser.push({
                "userName" : req.cookies['uname']
            });
            item.vote +=1;
            vote = item.vote;
            i = index;
            return;
        }
    });

    userModel.getCount(function(user){
        if(vote > user.count/2){
            var entity = {
                username : entitylist[i].username,
                email : entitylist[i].email,
                password : entitylist[i].password,
                name : entitylist[i].name,
                contact : entitylist[i].phone,
                address : entitylist[i].address,
                sq : entitylist[i].sq,
                image : entitylist[i].image
            };
            userModel.insert(entity,function(status){
                if(status){
                    userModel.delete(entitylist[i].id,function(stat){
                        if(stat){
                            userModel.getAlluserName(function(results){
                                var county = 0;
                                var taunty = results.length;
                                results.forEach(function(user){
                                    fs.exists('./assets/json/'+user.username+'.json', function(exists){
                                        if(exists){
                                            var data=fs.readFileSync('./assets/json/'+user.username+'.json', 'utf8');
                                            var validentity=JSON.parse(data);
                                            validentity.push(entitylist[i]);
                                            fs.writeFile('./assets/json/'+user.username+'.json', JSON.stringify(validentity, null, 2), (err) => {
                                                if (err) {
                                                    console.error(err);
                                                    return;
                                            }
                                            });
                                            if(county == taunty-1){
                                                entitylist = entitylist.filter(item => item !== entitylist[i]);
                                                fs.writeFile("./assets/json/pending_entity.json", JSON.stringify(entitylist, null, 2), (err) => {
                                                    if (err) {
                                                        console.error(err);
                                                        return;
                                                    }  
                                                    res.redirect('/entity/allPendingEntity');
                                                });
                                            }
                                            county++;
                                        }
                                        else{
                                            var array =[entitylist[i]];
                                            fs.writeFile('./assets/json/'+user.username+'.json', JSON.stringify(array, null, 2), (err) => {
                                                if (err) {
                                                    console.error(err);
                                                    return;
                                                }
                                            });
                                            if(county == taunty-1){
                                                entitylist = entitylist.filter(item => item !== entitylist[i]);
                                                fs.writeFile("./assets/json/pending_entity.json", JSON.stringify(entitylist, null, 2), (err) => {
                                                    if (err) {
                                                        console.error(err);
                                                        return;
                                                    }  
                                                    res.redirect('/entity/allPendingEntity');
                                                });
                                            }
                                            county++;
                                        }
                                    });
                                });
                            });
                        }
                    });
                }
            });
        }
        else{
            fs.writeFile("./assets/json/pending_entity.json", JSON.stringify(entitylist, null, 2), (err) => {
                if (err) {
                    console.error(err);
                    return;
                }  
                res.redirect('/entity/allPendingEntity');
            });
        }
    });
});

router.get('/reject/:id', (req, res)=>{
    var id = req.params.id;
    var data=fs.readFileSync('./assets/json/pending_entity.json', 'utf8');
    var entitylist=JSON.parse(data);
    entitylist.forEach(function(item){
        if(item.id == id){
            item.votedUser.push({
                "userName" : req.cookies['uname'] 
            });
            return;
        }
    });
    fs.writeFile("./assets/json/pending_entity.json", JSON.stringify(entitylist, null, 2), (err) => {
            if (err) {
                console.error(err);
                return;
            }
        });
    res.redirect('/entity/allPendingEntity');
});

module.exports = router;