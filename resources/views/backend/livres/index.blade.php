@extends('layouts.master')
@section('title')
Livres
@stop

@section('breadcumb')
    Article
@stop


@section('content')
<h1>Livres <a href="{{ route('livres.create') }}" class="launch-modal btn btn-sm  btn-primary pull-right" >+ Ajouter </a></h1>
<hr>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="dashboard-list-box">
            <h4 class="gray">Liste des livres </h4>
            <div class="table-box">
            <table class="basic-table booking-table">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Categorie</th>
                        <th>Date de publication</th>
                        <th>Couverture</th>
                        <th>Fichier PDF</th>
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
<script type="text/javascript">
    function loadBooks(){
      var url = "{!! url('/web-api-livres') !!}";
      var public_path = "{!! url('') !!}";
      var edit_path = "";
      $('tbody').replaceWith('<tbody></tbody>');

      axios.get(url).then((response) =>{
          var livres = response.data.livres;
          var tr = '';
          livres.forEach(item => {
              var caregorie = '' ;
              if (item.categorie.id != 0) {
                  categorie = '<td>'+item.categorie.nom+'</td>';
              } else {
                  categorie = '<td></td>'
              }
                tr +='<tr>'+
                        '<td><a href="javascript: void(0)">'+item.titre+'</a></td>'+
                        '<td>'+item.auteur+'</td>'+
                         caregorie+
                        '<td>'+item.date_publication+'</td>'+
                        '<td>'+
                            '<div class="avatar-preview">'+
                                '<img src="uploads/livres/'+item.couverture+'" alt="" srcset="">'+
                            '</div>'+
                        '</td>'+

                        '<td >'+
                            '<a href="uploads/pdf/'+item.fichier_pdf+'" class="btn btn-sm btn-primary" download>'+
                                '<i class="sl sl-icon-cloud-download"></i>'+
                            '</a>'+
                        '</td>'+
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
        var url = "{!! url('/livres') !!}/"+id;
        Swal.fire({
            title: 'Suppression',
            text: "Voulez-vous supprimer ce livre ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#50aecb',
            cancelButtonColor: '#333',
            confirmButtonText: 'Supprimer',
            cancelButtonText: 'Annuler'
            }).then((result) => {
            if (result.isConfirmed) {
                axios.delete(url).then((response) => {
                    if (response.data.status) {
                        Swal.fire('Suppression!',response.data.message,'success');
                         loadBooks();
                    }
                });
            }
            })
     }


     function showBook(id) {
        $('.show-book').modal('show')

     }


    $(document).ready(function(){
      loadBooks();
    });

</script>
@endsection
