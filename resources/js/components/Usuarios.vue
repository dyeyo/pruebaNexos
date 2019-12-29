<template>
    <div>
        <div class="row">
            <div class="col-lg-4">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Total en Cuentas</h5>
                    </div>
                    <div class="ibox-content">
                        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-plus-square"></i> </button>
                        <h1 class="no-margins">{{registros.length}}</h1>
                        <small>Total Cuentas Activas</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Total Retiros</h5>
                    </div>
                    <div class="ibox-content">
                        <button class="btn btn-primary float-right"> <i class="fa fa-plus-square"></i> </button>
                        <h1 class="no-margins">60 420,600</h1>
                        <small>New orders</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Total Cuentas Activas</h5>
                    </div>
                    <div class="ibox-content">
                        <button class="btn btn-primary float-right"><i class="fa fa-plus"></i> </button>
                        <h1 class="no-margins">$ 120 430,800</h1>
                        <small>New orders</small>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="registros.length < 1" class="alert alert-danger">Recuerda que debes consignar
            minimo a su cuenta $100.000 para su activacion dando clic <a href="/movimientos"> Aqui</a> o creala  <button class="btn btn-link" data-toggle="modal" data-target="#exampleModal"> Aquí </button>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight" id="tablaCuentas">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Cuentas Bancarias Activas</h5>
                            <div class="ibox-tools">
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    <div class="row">
                                        <table class="table table-striped table-bordered table-hover dataTables-example dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 201.8px;">
                                                N°
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 201.8px;">
                                                Teléfono
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 201.8px;">
                                                Fecha de Creación
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 201.8px;">
                                                Editar
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="gradeA odd" role="row" v-for="(item, index) in registros"  :key="index">
                                            <td class="sorting_1">{{item.id}}</td>
                                            <td>{{item.telefono}}</td>
                                            <td>{{item.created_at}}</td>
                                            <td>
                                                <button  @click="editarformulario(item)" class="btn btn-warning float-left" data-toggle="modal" data-target="#editarCuenta"> <i class="fa fa-edit"></i> </button>

                                                <button  @click="desactivarCuenta(item)" class="btn btn-danger float-left"> <i class="fa fa-trash"></i> </button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Crear Cuenta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="saveRegistre()">
                            <input v-model="dato.numero_cuenta" style="display:none;" type="text" id="numero_cuenta" name="numero_cuenta" class="form-control">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><label>Teléfono</label>
                                        <input  v-model="dato.telefono" type="text" id="telefono" name="telefono" placeholder="Digita tu Telefono/Celular" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><label>Dirección</label>
                                        <input  v-model="dato.direccion"  type="text" id="direccion" name="direccion" placeholder="Digita tu Dirección" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Agregar Cuenta</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editarCuenta" tabindex="-1" role="dialog" aria-labelledby="editarCuenta" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarCuentas">Editar Cuenta {{dato.numero_cuenta}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="editarCuenta(dato)">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><label>Teléfono</label>
                                        <input  v-model="dato.telefono" type="text" name="telefono" placeholder="Digita tu Telefono/Celular" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><label>Dirección</label>
                                        <input  v-model="dato.direccion"  type="text" name="direccion" placeholder="Digita tu Dirección" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Editar Cuenta</button>
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
                registros:[],
                dato:{
                    numero_cuenta:'',
                    telefono:'',
                    direccion:'',
                    estado:'',
                    id:'',
                    created_at:''
                },
                formEditar:false,
            }
        },
        mounted() {
            this.dato.numero_cuenta=Math.floor(Math.random()*456*454);
        },
        created(){
            this.getData();
        },
        methods:{
            getData(){
                let self = this;
                axios.get('/cuentas').then(function(res){
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
                this.dato.numero_cuenta='',
                this.dato.telefono='',
                this.dato.direccion='',
                $('#formularioRegistro').hide();
                $('#alert').show();
                $('.modal').modal('hide');

                axios.post(url, parametros).then(res=>{
                    this.registros.push(res.data).sort(res.data)
                }).catch(function(error){
                    console.log(error);
                })
            },

            editarformulario(item){
                $('#editarCuenta').modal('show');
                console.log(item.direccion)
                this.formEditar=false;
                this.dato.direccion=item.direccion;
                this.dato.telefono=item.telefono;
                this.dato.id=item.id;
            },
            editarCuenta(dato){
                const parametros={
                    direccion:this.dato.direccion,
                    telefono:this.dato.telefono,
                    numero_cuenta:this.dato.numero_cuenta,
                };
                this.formEditar=false;
                this.dato.direccion='';
                this.dato.telefono='';
                this.dato.numero_cuenta='';
                $('#editarCuenta').modal('hide');
                axios.put(`/cuentas/${dato.id}`, parametros).then((res)=>{
                    //buscar index
                    const index = this.registros.findIndex(item => item.id === dato.id)
                    this.registros[index]=res.data;
                    axios.get('/cuentas').then(res=>{
                        let datos=this.registros=res.data;
                        datos.sort();
                    })
                })
            },

            desactivarCuenta(dato, index){
                const parametros={
                    estado:2,
                };;
                const confirmacion = confirm(`Eliminar nota ${dato.numero_cuenta}`);
                if(confirmacion) {
                    axios.put(`/desactivar_cuenta/${dato.id}`, parametros).then((res) => {
                        //buscar index
                        const index = this.registros.findIndex(item => item.id === dato.id)
                        this.registros[index] = res.data;
                        axios.get('/cuentas').then(res => {
                            this.registros.splice(index, 1);
                            let datos = this.registros = res.data;
                            datos.sort();
                        })
                    })
                }
            },
        },
    }
</script>