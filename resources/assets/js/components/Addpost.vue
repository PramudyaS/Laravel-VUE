<template id="add-post">
	<div class="card card-default">
		<h3 class="card-header">Add New Employee</h3>
		<div class="card-body">
		<form v-on:submit.prevent="createPost">
			<div class="form-group">
				<label for="add-name">Name</label>
				<input type="text"  class="form-control" v-model="post.name" id="add-name" autocomplete="off">
			</div>
			<div class="form-group">
				<label for="add-jabatan">Jabatan</label>
				<select class="form-control" id="add-jabatan" v-model="post.jabatan">
					<option disabled value="">Select Position</option>
					<option>Manager</option>
					<option>HRD</option>
					<option>Boss</option>
				</select>
			</div>
			<div class="form-group">
				<label for="add-jenis_kelamin">Gender</label>
				<select class="form-control" id="add-jenis_kelamin" v-model="post.jenis_kelamin">
					<option disabled value="">Select Gender</option>
					<option>Man</option>
					<option>Women</option>
					<option>LMEN</option>
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Simpan</button>
			<router-link class="btn btn-warning" :to="'/'">Cancel</router-link>
		</form>
		</div>
	</div>
</template>

<script>
	export default{
		data: function(){
			return { post:{name:'',jabatan:'',jenis_kelamin:''}}
		},
		methods :{
			createPost:function(){
				let uri  = 'http://localhost:8000/karyawans/';
				Axios.post(uri, this.post).then((response) => {
				this.$router.push({name:'Listpost'})
				})
			}
		}
	}
</script>