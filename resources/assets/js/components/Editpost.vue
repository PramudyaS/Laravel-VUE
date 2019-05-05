<template id="post-edit">
	<div class="card card-default">
		<div class="card-header">
			<h3>Edit Employee</h3>
		</div>
		<div class="card-body">
			<form v-on:submit.prevent = "updatePost">
				<div class="form-group">
					<label for="edit-name">Name</label>
					<input id="edit-name" type="text" v-model="post.name" class="form-control" name="name" autocomplete="off">
				</div>
				<div class="form-group">
					<label for="edit-jabatan">Position</label>
					<select id="edit-jabatan" class="form-control" v-model="post.jabatan" name="jabatan">
						<option disabled value>Select Position</option>
						<option id="manager" selected="">Manager</option>
						<option id="employee">HRD</option>
						<option id="boss">Boss</option>
					</select>
				</div>
				<div class="form-group">
					<label for="edit-gender">Gender</label>
					<select id="edit-gender" class="form-control" v-model="post.jenis_kelamin" name="gender">
						<option disabled value>Select Gender</option>
						<option id="man">Man</option>
						<option id="women">Women</option>
						<option id="lmen">LMEN</option>
					</select>
				</div>
				<button type="submit" class="btn btn-primary">Update Employee</button>
				<router-link  class="btn btn-warning" v-bind:to="'/'">Cancel</router-link>
			</form>
		</div>
	</div>
</template>

<script>
	export default{
		data:function(){
			return {post:{name:'',jabatan:'',jenis_kelamin:''}}
		},
		created:function(){
			let uri = 'http://localhost:8000/karyawans/'+this.$route.params.id+'/edit';
			Axios.get(uri).then((response) =>{
				this.post = response.data;
			});
		},
		methods : {
			updatePost : function(){
				let uri = 'http://localhost:81/CRUDVue/karyawans/'+this.$route.params.id;
				Axios.patch(uri,this.post).then((response)=>{
					this.$router.push({name:'Listpost'})
				});
			}
		}
		}
</script>