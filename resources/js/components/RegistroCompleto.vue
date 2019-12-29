<template>
    <div>
        <div class="alert alert-info" id="alert" style="display: none">
            <h2>Felicidades, completaste el registro</h2>
            <span>Estos son tus datosa de la cuenta</span>
            <ul>
                <li class="font-weight-bold">Número de documento: {{dato.numero_doc}}</li>
                <li class="font-weight-bold">Número de Cuenta: {{dato.numero_cuenta}}</li>
                <li class="font-weight-bold">Su clave son los 4 ultmios digitos de su numero de identificación</li>
                <hr>
                <h3>Para Activar tu cuenta debes realizar una conignación minima de $100.000 <a href="/movimientos"> Aqui</a></h3>
                <a href="/cuentas" class="btn btn-primary">Actualizar</a>
            </ul>
        </div>
        <div class="row" id="formularioRegistro">
            <div class="col-lg-12 col-md-142 col-sm-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Terminemos de completar tu registro</h5>
                    </div>
                    <div class="ibox-content">
                        <form @submit.prevent="saveRegistre()">
                            <input v-model="dato.numero_cuenta" style="display:none;" type="text" id="numero_cuenta" name="numero_cuenta" class="form-control">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"><label>Teléfono</label>
                                        <input  v-model="dato.telefono" type="text" id="telefono" name="telefono" placeholder="Digita tu Telefono/Celular" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label>Dirección</label>
                                        <input  v-model="dato.direccion"  type="text" id="direccion" name="direccion" placeholder="Digita tu Dirección" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-lg-10 offset-1">
                                            <button class="btn btn-block btn-primary" type="submit">Finalizar Registro</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                registro:[],
                dato:{
                    numero_cuenta:'',
                    telefono:'',
                    direccion:''
                },
            }
        },
        created(){
            this.getData();
        },
        mounted() {
            this.dato.numero_cuenta=Math.floor(Math.random()*158*454);
        },
        methods:{
            getData(){
                let self = this;
                axios.get('/cuentas').then(function(res){
                    console.log(res.data);
                    self.registros = res.data;
                });
            },
            saveRegistre(){
                let url=('/cuentas');
                const parametros={
                  numero_cuenta:this.dato.numero_cuenta,
                  telefono:this.dato.telefono,
                  direccion:this.dato.direccion,
                };

                $('#formularioRegistro').hide();
                $('#alert').show();
                $('#tablaCuentas').show();

                axios.post(url, parametros).then(res=>{
                    this.registro.push(res.data).sort(res.data)
                }).catch(function(error){
                    console.log(error);
                })
            }
        },
    }
</script>
