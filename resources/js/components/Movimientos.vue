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
                        <h1 class="no-margins">{{movimientos.length}}</h1>
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
                        <h1 class="no-margins">$ 120 430,800</h1>
                        <small>New orders</small>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="movimientos.length > 1" class="alert alert-danger">Recuerda que debes consignar
            minimo a su cuenta $100.000 para su activacion, si no la tienes creala  <button class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-plus-square"></i> </button>

        </div>
        <div class="wrapper wrapper-content animated fadeInRight" id="tablaCuentas">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Movimientos Bancarios</h5>
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
                                                Valor
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="gradeA odd" role="row" v-for="(item, index) in movimientos"  :key="index">
                                            <td class="sorting_1">{{item.id}}</td>
                                            <td>{{item.saldo}}</td>
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
                                    <div class="form-group"><label>Saldo</label>
                                        <input  v-model="datos.saldo"  type="text" id="saldo" name="saldo" placeholder="saldo" class="form-control">
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

    </div>
</template>
<script>
    export default {
        data(){
            return{
                movimientos:[],
                cuentas:[],
                datos:{
                    saldo:'',
                    cuenta_id:''
                },
            }
        },
        created(){
            this.getData();
            this.getCuentasUser();
        },
        methods:{
            getData(){
                let self = this;
                axios.get('/movimientos').then(function(res){
                    self.movimientos = res.data;
                });
            },

            getCuentasUser(){
                let self = this;
                axios.get('/cuentasUser').then(function(res){
                    self.cuentas = res.data;
                });
            },
            saveRegistre(){
                let url=('/movimientos');
                const parametros={
                    saldo:this.datos.saldo,
                    cuenta_id:this.datos.cuenta_id,
                };
                this.datos.saldo='',
                this.datos.cuenta_id='',
                $('#formularioRegistro').hide();
                $('#alert').show();
                $('.modal').modal('hide');

                axios.post(url, parametros).then(res=>{
                    this.movimientos.push(res.data).sort(res.data)
                }).catch(function(error){
                    console.log(error);
                })
            },
            //
            // editarformulario(item){
            //     $('#editarCuenta').modal('show');
            //     console.log(item.direccion)
            //     this.formEditar=false;
            //     this.dato.direccion=item.direccion;
            //     this.dato.telefono=item.telefono;
            //     this.dato.id=item.id;
            // },
            //
            // editarCuenta(dato){
            //     const parametros={
            //         direccion:this.dato.direccion,
            //         telefono:this.dato.telefono,
            //         numero_cuenta:this.dato.numero_cuenta,
            //     };
            //     this.formEditar=false;
            //     this.dato.direccion='';
            //     this.dato.telefono='';
            //     this.dato.numero_cuenta='';
            //     $('#editarCuenta').modal('hide');
            //     axios.put(`/cuentas/${dato.id}`, parametros).then((res)=>{
            //         //buscar index
            //         const index = this.registros.findIndex(item => item.id === dato.id)
            //         this.registros[index]=res.data;
            //         axios.get('/cuentas').then(res=>{
            //             let datos=this.registros=res.data;
            //             datos.sort();
            //         })
            //     })
            // },
            //
            // desactivarCuenta(dato, index){
            //     const parametros={
            //         estado:2,
            //     };;
            //     const confirmacion = confirm(`Eliminar nota ${dato.numero_cuenta}`);
            //     if(confirmacion) {
            //         axios.put(`/desactivar_cuenta/${dato.id}`, parametros).then((res) => {
            //             //buscar index
            //             const index = this.registros.findIndex(item => item.id === dato.id)
            //             this.registros[index] = res.data;
            //             axios.get('/cuentas').then(res => {
            //                 this.registros.splice(index, 1);
            //                 let datos = this.registros = res.data;
            //                 datos.sort();
            //             })
            //         })
            //     }
            // },
        },
    }
</script>