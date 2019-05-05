<template id="post">
	<div>
		<h3>Detail View Employee</h3>
		<hr>
		<div class="row">
		<div class="col-md-2">
			<h4>Name</h4>
			<h4>Position</h4>
			<h4>Gender</h4>
			<h4>Created At</h4>
		</div>
		<div class="col-md-1">
		<h4>:</h4>
		<h4>:</h4>
		<h4>:</h4>
		<h4>:</h4>
		</div>
		<div class="col-md-6" style="margin-left:-7%;">
		<h4>{{ post.name }}</h4>
		<h4>{{ post.jabatan }}</h4>
		<h4>{{ post.jenis_kelamin }}</h4>
		<h4>{{ post.created_at }}</h4>
		</div>
		</div>
	<router-link v-bind:to="'/'" class="btn btn-warning" style="margin-top:5%">Back</router-link>
	</div>
</template>

<script>
	export default{
		data:function(){
			return {post:{name:'',jabatan:'',jenis_kelamin:''}}
		},
		created: function (){
			let uri = 'http://localhost:8000/karyawans/' + this.$route.params.id;
			Axios.get(uri).then((response)=>{
				this.post = response.data;
			});
		}
	}
</script>