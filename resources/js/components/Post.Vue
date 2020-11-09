<template>
    <div>

        <form  method="GET" @submit.prevent='submit'>
            <label for="token">
                Introduzca su Token
               <textarea name="token" cols="30" rows="10" v-model='token'></textarea>
                <b>Si no tiene un token <a href="/testing">Inicie sesión</a></b>
            </label><br><br>
            <b>*Busqueda personalizada*</b>
            <br>
            <label for="user_id">
                Introduzca el id del usuario que quiere buscar
               <input name="user_id" v-model='postId'>
              <p> Si no conoces su id  listalos todos.  </p>  <b>(En caso de dejar este input vacio, se listaran TODOS los usuarios)</b>
            </label><br><br>
            <b>Si lo que quieres es eliminar un usuario, listados primero y tendras la opcion</b>
            <br>
            <br>
            <button  class="btn btn-primary" type="submit">Listar</button>
        </form>
    <section v-if="apiResponse">
                 <hr>
                <h2>Respuesta de la api</h2>
                <pre v-text="apiResponse"></pre>
            </section>
        <div v-if="apiResponse && !errors">
             <hr>
            <h2>Respuesta formateada</h2>

            <ul v-if="posts">
                <li v-for="(post, index) in posts" >
                   Titulo {{ post.title  }}  categoria {{ post.category_name  }} Publicado ( {{ post.posted_at }} )

                </li>

            </ul>

        </div>








    </div>

</template>


<script>

    export default {
        data(){
            return{
                fields:{},
                errors:null,
                apiResponse:null,
                token:null,
                postId:"",
                posts:null,
                preActualId:null,
                actualId:null
            }
        },
        methods:{
            submit(){
                axios.get('/api/posts/'+this.postId,{
                    headers: {'Authorization': 'Bearer '+ this.token}
                })
               .then((response)=>{
                   this.apiResponse=response.data;
                   this.posts=response.data.data;
                })
                .catch(error=>{
                   this.apiResponse=error.response.data;
                   this.errors=error.response.data;
                   console.log(this.errors);
                });
            }

        }

    }
</script>



