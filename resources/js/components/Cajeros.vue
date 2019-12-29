<template>
    <div>
        <div class="row">
            <div class="col-lg-4">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Total Movimientos</h5>
                    </div>
                    <div class="ibox-content">
                        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-plus-square"></i> </button>
                        <h1 class="no-margins">{{cajero.length}}</h1>
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
        <div class="wrapper wrapper-content animated fadeInRight" id="tablaCuentas">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Movimientos Bancarios por Cajero</h5>
                            <div class="ibox-tools">
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <div id="" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                  <div class="row">
                                      <div class="col-sm-12">
                                        <table class="table table-striped table-bordered table-hover" role="grid" aria-describedby="DataTables_Table_0_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 201.8px;">
                                                N°
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 201.8px;">
                                                Valor
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 201.8px;">
                                                Ver Detalles
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="gradeA odd" role="row" v-for="(item, index) in cajero"  :key="index">
                                            <td class="sorting_1">{{item.id}}</td>
                                            <td>{{item.saldo}}</td>
                                            <td>
                                                <button  @click="detalle(item)" class="btn btn-default float-left" data-toggle="modal" data-target="#detallesCuenta"> <i class="fa fa-eye"></i> </button>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><label>Usuarios</label>
                                        <select v-model="datos.usuario_id" required id="usuario_id" name="usuario_id" class="form-control m-b">
                                            <option  v-for="(item, index) in usuarios" :key="index"
                                                     :value="item.id"
                                                     >
                                                {{item.numero_doc}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><label>Cuentas</label>
                                        <select v-model="datos.cuenta_id" required id="cuenta_id" name="cuenta_id" class="form-control m-b">
                                            <option  v-for="(item, index) in cuentas" :key="index"
                                                     :value="item.id"
                                                     >
                                                {{item.numero_cuenta}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><label>Típo de Acción</label>
                                        <select v-model="datos.tipo_accion" required id="tipo_accion" name="tipo_accion" class="form-control m-b">
                                            <option value="Retiro">Retiro</option>
                                            <option value="Consignacion">Consignación</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><label>Saldo</label>
                                        <input  v-model="datos.saldo"  type="text" id="saldo" name="saldo" placeholder="saldo" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><label>Descripción</label>
                                        <textarea  class="form-control m-b"  v-model="datos.descripcion" id="descripcion" name="descripcion" style="resize: none"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Finalizar Movimiento</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="detallesCuenta" tabindex="-1" role="dialog" aria-labelledby="detallesCuenta" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detallesCuentas">Editar Cuenta </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="detalle(datos)">
                            <div class="row">
                                <!--saldo:'',
                                    tipo_accion:'',
                                    descripcion:'',
                                    cuenta_id:'',
                                    usuario_id :''-->
                                <div class="col-md-12">
                                    <div class="form-group"><label>Saldo</label>
                                        <input   readonly="readonly" type="text" v-model="datos.saldo" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><label>Tipo de Accion</label>
                                        <input   readonly="readonly" type="text" v-model="datos.tipo_accion" class="form-control">
                                    </div>
                                </div>
                            </div>

                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><label>Descripción</label>
                                        <input   readonly="readonly" type="text" v-model="datos.descripcion" class="form-control">
                                    </div>
                                </div>
                            </div>

                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><label>Cuenta Alterada</label>
                                        <input   readonly="readonly" type="text" v-model="datos.numero_cuenta" class="form-control">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><label>Datos del usuario</label>
                                        <input  readonly="readonly" type="text" v-model="datos.numero_doc" class="form-control">
                                        <input  readonly="readonly" type="text" v-model="datos.name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
                cajero:[],
                cuentas:[],
                usuarios:[],
                datos:{
                    saldo:'',
                    tipo_accion:'',
                    descripcion:'',
                    cuenta_id:'',
                    usuario_id :'',
                    numero_doc :'',
                    numero_cuenta:'',
                    name:''
                }
            }
        },
        created(){
            this.getData();
            this.getCuentasUser();
            this.getUser();
        },
        methods:{
            getData(){
                let self = this;
                axios.get('/cajeros').then(function(res){
                    self.cajero = res.data;
                });
            },

            getCuentasUser(){
                let self = this;
                axios.get('/cuentasUserCajero').then(function(res){
                    self.cuentas = res.data;
                });
            },

            getUser(){
                let self = this;
                axios.get('/UserCajero').then(function(res){
                    self.usuarios = res.data;
                });
            },

            saveRegistre(){
                let url=('/cajeros');
                const parametros={
                    saldo:this.datos.saldo,
                    tipo_accion:this.datos.tipo_accion,
                    descripcion:this.datos.descripcion,
                    cuenta_id:this.datos.cuenta_id,
                    usuario_id :this.datos.usuario_id
                };
                this.datos.saldo='',
                this.datos.cuenta_id='',
                $('#formularioRegistro').hide();
                $('#alert').show();
                $('.modal').modal('hide');

                axios.post(url, parametros).then(res=>{
                    this.cajero.push(res.data).sort(res.data)
                }).catch(function(error){
                    console.log(error);
                })
            },

            detalle(item){
                $('#detallesCuenta').modal('show');
                this.formEditar=false;
                this.datos.saldo=item.saldo;
                this.datos.numero_doc=item.numero_doc;
                this.datos.tipo_accion=item.tipo_accion;
                this.datos.descripcion=item.descripcion;
                this.datos.cuenta_id=item.cuenta_id;
                this.datos.usuario_id =item.usuario_id;
                this.datos.name =item.name;
                this.datos.numero_cuenta =item.numero_cuenta;
                this.datos.id=item.id;
            },

        },
    }
</script>