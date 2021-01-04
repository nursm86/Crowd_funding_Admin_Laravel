const db = require('./db');

module.exports= {
	validate: function(user, callback){
		var sql = "select * from users where username='"+user.username+"' and password='"+user.password+"'";
		db.getResults(sql, function(results){
			callback(results);
		});
	},
	getAlluserName:function(callback){
		var sql = "select username from users where type = 0";
		db.getResults(sql, function(results){
			if(results.length >0 ){
				callback(results);
			}
		});
	},
	getById: function(id, callback){
		var sql = "select * from users where id='"+id+"'";
		db.getResults(sql, function(results){
			if(results.length >0 ){
				callback(results[0]);
			}
		});
	},
	getCount:function(callback){
		var sql = "select COUNT(*) as count from users  where type = 0";
		db.getResults(sql, function(results){
			if(results.length >0 ){
				callback(results[0]);
			}
		});
	},
	getUserName : function(user,callback){
		var sql = "select * from users where "+user.field+"='"+user.value+"'";
		db.getResults(sql, function(results){
			if(results.length >0 ){
				callback(results[0]);
			}
		});
	},
	insert: function(admin, callback){
		var sql = "INSERT INTO users(username,email, password, type, status, image) VALUES ('"+admin.username+"','"+admin.email+"','"+admin.password+"','"+0+"','"+1+"','"+admin.image+"')";
		db.execute(sql,function(status){
			if(status){
				sql = "select id from users where username = '"+admin.username+"'";
				db.getResults(sql, function(result){
					sql = "INSERT INTO admins(uid, name, phone, address, sq) VALUES ('"+result[0].id+"','"+admin.name+"','"+admin.contact+"','"+admin.address+"','"+admin.sq+"')";
					db.execute(sql,function(status){
						callback(status);
					});
				});
			}
			
		});
	},
	delete: function(id, callback){
		var sql = "DELETE FROM pending_admin_logs WHERE id = '"+id+"'";
		db.execute(sql,function(status){
			callback(status);
		});
	}
};