@extends('layouts.master')
@section('title')
Categorie
@stop



@section('content')




    <h1>Catégories <a href="javascript: void(0)" class="create-cat btn btn-sm  btn-primary pull-right" onclick="createCat()">+ Ajouter </a></h1>
    <hr>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="dashboard-list-box">
                <h4 class="gray">Liste des catégories </h4>
                <div class="table-box">
                <table class="basic-table booking-table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>



                    </tbody>
                </table>
                </div>
            </div>

        </div>
    </div>


@endsection
@section('js')
    <script>

     async function createCat() {
        var nom;
        var description;
        var url = "{!! url('/categories') !!}";

        const { value: formValues } = await Swal.fire({
            title: 'Enregistrement Catégorie',
            html:
                ' <div class="row">' +
                '<div class="col-md-12">' +
                    '<label>Libellé </label>' +
                    '<input class="swal-input2 nom-categorie" type="text" >' +
                '</div>' +
                '</div>' +
                '<div class="row with-forms">' +
                '<div class="col-md-12">' +
                    '<label>Description</label>' +
                '</div>' +
                '<textarea class="description-categorie" id="swal-input2"  cols="40" rows="3" ></textarea>' +
            '</div>',
            focusConfirm: false,
            showCancelButton: true,
            confirmButtonColor: '#50aecb',
            cancelButtonColor: '#66676b',
            confirmButtonText: 'Enregistrer',
            cancelButtonText: 'Annuler',
            preConfirm: () => {
                return [
                  nom = $('.nom-categorie').val(),
                  description = $('.description-categorie').val()
                ]
              }
            })

            if (formValues) {
              var _data = {
                  nom : nom,
                  description : description
              }
              axios.post(url,_data).then((response) => {
                  if (response.data.status) {
                        Swal.fire('Succès!',response.data.message,'success');
                        loadCategorie();
                  }
              })
            }
     }

    function loadCategorie(){
      var url = "{!! url('/web-api-categorie') !!}";
      var public_path = "{!! url('') !!}";
      var edit_path = "";
      $('tbody').replaceWith('<tbody></tbody>');

      axios.get(url).then((response) =>{
          var categories = response.data.categories;
          var tr = '';
          categories.forEach(item => {

                tr +='<tr>'+
                        '<td><a href="javascript: void(0)">'+item.nom+'</a></td>'+
                        '<td >'+
                            '<a href="{!! url("livres/'+item.id+'/edit") !!}" class="btn btn-sm btn-primary">'+
                                '<i class="sl sl-icon-pencil"></i>'+
                            '</a>'+
                            '<a href="" class="btn btn-sm btn-default" onclick="showBook('+item.id+')">'+
                                '<i class="sl sl-icon-eye"></i>'+
                            '</a>'+
                            '<a href="javascript: void(0)" class="btn btn-sm btn-danger" onclick="destroy('+item.id+')">'+
                              '<i class="sl sl-icon-close"></i>'+
                        '</a>'+
                        '</td>'+
                    '</tr>';
          });

            $('tbody').append(tr);
      });
    }

     function destroy(id) {
        var url = "{!! url('/categories') !!}/"+id;
        Swal.fire({
            title: 'Suppression',
            text: "Voulez-vous supprimer cette catégorie ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#50aecb',
            cancelButtonColor: '#66676b',
            confirmButtonText: 'Supprimer',
            cancelButtonText: 'Annuler'
            }).then((result) => {
            if (result.isConfirmed) {
                axios.delete(url).then((response) => {
                    if (response.data.status) {
                        Swal.fire('Suppression!',response.data.message,'success');
                         loadCategorie();
                    }
                });
            }
            })
     }


     function showBook(id) {
        $('.show-book').modal('show')

     }


    $(document).ready(function(){
      loadCategorie();
    });
    </script>
@endsection
