<template>
    <div class="row">
        <div class="col-md-6">
          <form  method="POST" @submit.prevent='submit'>
            <h1>Paso 1, confirma tu contraseña para obtener el token</h1>

            <div class="form-group"  >
              <label>Correo</label>
             <input type="email" name="email" v-model='fields.email' class="form-control">

            </div>
            <div class="form-group" >
              <label>Contraseña</label>

             <input type="password" name="password" v-model='fields.password' class="form-control">

            </div>
            <button class='btn btn-primary' type="submit">Entrar</button>
        </form></div>

        <section v-if="apiResponse">
            <div v-if="!apiResponse.error"  >
                <div >
                    <h2 class="text-succes">Paso 2, copia el token click aqui</h2>
                    <a href="/testing/api" class="btn btn-success">Probar la api (Solo si ya copiaste el token)</a>

<br>
                    <label for="">Token, OBLIGATORIO ya que la api esta protegida con autenticacion por token </label>
                    <br>
                    <textarea cols="20" rows="10" v-model="token"></textarea>





                </div>


            </div>

     <h1>Respuesta api</h1>
            <pre v-text="apiResponse"></pre>


        </section>

    </div>

</template>


<script>
    export default {
        data(){
            return{
                fields:{},
                token:null,
                apiResponse:null
            }
        },
        methods:{
            submit(){
                axios.post('http://127.0.0.1:8000/api/login',this.fields)
               .then((response)=>{
                   this.fields={};
                   this.apiResponse=response.data;
                   this.token=response.data.access_token;
                })
                .catch(error=>{
                   this.apiResponse=error.response.data;
                });
            }
        }

    }
</script>
