<template>
  <div>
    <vue-progress-bar />
    <div class="main-panel">
      <top-nav />
      <div class="content">
        <div class="container-fluid">
          <br />
          <StatusAdmin />
          <br />
          <div v-if="loaded" class="row">
            <div class="col-md-12 expo">
              <div class="card card-stats">
                <div :class="getColorCardUser()">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <p class="card-category">
                    <b>All Announces Assigned</b>
                  </p>
                  <h3 class="card-title" style="color:red;">
                    <b>{{taskuserassigns.length}}</b>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">assignment</i>
                    <b>All announces Assigned</b>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div v-if="!loaded" class="submit">
            <LoaderLdsDefault />
          </div>
          <div v-if="loaded" class="row">
            <div class="col-md-12 expo">
              <div class="card">
                <div :class="getColorHeaderUser()">
                  <div class="row">
                    <div class="col-md-6">
                      <h4 class="card-title">
                        <b>Datatables announces assigned</b>
                      </h4>
                      <p class="card-title">Announces Assigned</p>
                    </div>
                    <div class="col-md-6 text-right">
                      <span>
                        <i id="tooltipSize" class="material-icons">assignment</i>
                      </span>
                    </div>
                  </div>
                </div>
                <br />
                <div class="card-body">
                  <div class="header text-right">
                    <button
                      @click="reload"
                      class="btn btn-success btn-raised button_note btn-sm"
                      title="Refresh Page"
                    >
                      <i class="material-icons">replay</i>
                      <b class="title_hover">Refresh</b>
                    </button>
                  </div>
                  <br />
                  <div class="material-datatables">
                    <table
                      id="datatables"
                      class="table table-striped table-no-bordered table-hover"
                      cellspacing="0"
                      width="100%"
                      style="width:100%"
                    >
                      <thead>
                        <tr>
                          <th>
                            <b>Title</b>
                          </th>
                          <th>
                            <b>Duration</b>
                          </th>
                          <th>
                            <b>Assigned To</b>
                          </th>
                          <th>
                            <b>Edited By</b>
                          </th>
                          <th class="disabled-sorting text-right">
                            <b
                              v-if="($auth.can('publish-occupation') || $auth.can('edit-occupation') || $auth.can('delet-occupation'))"
                            >Actions</b>
                          </th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>
                            <b>Title</b>
                          </th>
                          <th>
                            <b>Duration</b>
                          </th>
                          <th>
                            <b>Assigned To</b>
                          </th>
                          <th>
                            <b>Edited By</b>
                          </th>
                          <th class="disabled-sorting text-right">
                            <b
                              v-if="($auth.can('publish-occupation') || $auth.can('edit-occupation') || $auth.can('delet-occupation'))"
                            >Actions</b>
                          </th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <tr v-for="item in taskuserassigns" :key="item.id">
                          <td>
                            <b>{{ (item.annonce.title.length > 15 ? item.annonce.title.substring(0,15)+ "..." : item.annonce.title) | upText }}</b>
                          </td>
                          <td>
                            <b>{{ (item.periode) }}</b>
                          </td>
                          <td>
                            <router-link
                              :to="{ path: `/dashboard/technicians/c/${item.annonce.city.slug}/` }"
                            >
                              <img
                                :src="item.user.avatar"
                                :alt="item.user.username"
                                style="width: 40px; height: 40px;  top: 15px; left: 15px; border-radius: 50%"
                              />
                            </router-link>
                          </td>
                          <td>
                            <a href="javascript:void(0)" @click="getUser(item)">
                              <button
                                v-if="item.statusOnline"
                                type="button"
                                class="btn btn-success btn-round btn-just-icon btn-sm"
                                title="Administrator Online"
                              />
                              <button
                                v-else="item.statusOnline"
                                type="button"
                                class="btn btn-danger btn-round btn-just-icon btn-sm"
                                title="Administrator Offline"
                              />
                              {{ (item.member.name.length > 15 ? item.member.name.substring(0,15)+ "..." : item.member.name) | upText }}
                            </a>
                          </td>
                          <td class="td-actions text-right">
                            <button
                              @click="viewItem(item)"
                              class="btn btn-link btn-warning btn-round btn-just-icon"
                              title="View"
                            >
                              <i class="material-icons">visibility</i>
                            </button>
                            <button
                              v-if="$auth.can('delete-occupation')"
                              @click="editItem(item)"
                              class="btn btn-link btn-success btn-round btn-just-icon"
                              title="Edit"
                            >
                              <i class="material-icons">edit</i>
                            </button>
                            <button
                              v-if="$auth.can('delete-occupation')"
                              @click="deleteItem(item.id)"
                              class="btn btn-link btn-danger btn-round btn-just-icon"
                              title="Delete"
                            >
                              <i class="material-icons">delete_forever</i>
                            </button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- Modal view annonces -->
                  <div class="modal fade" id="viewNew" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="addNewLabel">
                            <b>View assignement</b>
                          </h5>
                          <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                          >
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <br />
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Title</label>
                                <input
                                  v-model="annonceItem.title"
                                  type="text"
                                  name="title"
                                  class="form-control"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Occupation</label>
                                <input
                                  v-model="annonceItem.annonce.occupation.name"
                                  type="text"
                                  name="name"
                                  maxlength="25"
                                  class="form-control"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Category occupation</label>
                                <input
                                  v-model="annonceItem.annonce.categoryoccupation.name"
                                  type="text"
                                  name="name"
                                  maxlength="25"
                                  class="form-control"
                                />
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="form-group">
                                <label>Duration</label>
                                <input
                                  v-model="annonceItem.periode"
                                  type="text"
                                  name="name"
                                  maxlength="25"
                                  class="form-control"
                                />
                              </div>
                            </div>
                          </div>
                          <br />
                          <div class="row">
                            <div class="col-md-8 ml-auto mr-auto">
                              <div class="profile text-center">
                                <img
                                  :src="annonceItem.user.avatar"
                                  :alt="annonceItem.user.username"
                                  style="width: 80px; height: 80px;  top: 30px; left: 30px; border-radius: 100%"
                                />
                                <br />
                                <div
                                  class="fileinput fileinput-new text-center"
                                  data-provides="fileinput"
                                >
                                  <div class="fileinput-new thumbnail"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <br />
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Description</label>
                                <input
                                  v-model="annonceItem.description"
                                  type="text"
                                  name="description"
                                  class="form-control"
                                />
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-danger" data-dismiss="modal" type="button">
                                <span class="btn-label">
                                  <i class="material-icons">clear</i>
                                  <b>Close</b>
                                </span>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal edit annonces -->
                <form
                  class="modal fade"
                  id="editNew"
                  @keydown="form.onKeydown($event)"
                  @submit.prevent="updateItem()"
                  role="dialog"
                  tabindex="-1"
                >
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="addNewLabel">
                          <b>Edit assignement</b>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <br />
                        <div class="row">
                          <div class="col-md-10">
                            <div class="form-group">
                              <label>Title</label>
                              <input
                                v-model="form.title"
                                type="text"
                                name="title"
                                class="form-control"
                              />
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label>Duration</label>
                              <input
                                v-model="form.periode"
                                type="text"
                                name="name"
                                maxlength="25"
                                class="form-control"
                              />
                            </div>
                          </div>
                        </div>
                        <br />
                        <br />
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Description</label>
                              <input
                                v-model="form.description"
                                type="text"
                                name="description"
                                class="form-control"
                              />
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-success"  type="submit">
                              <span class="btn-label">
                                <i class="material-icons">save</i>
                                <b>Update</b>
                              </span>
                            </button>
                          </div>
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
      <footer-admin />
    </div>
  </div>
</template>
<script>
import StatusAdmin from "../../inc/admin/StatusAdmin";
import LoaderLdsDefault from "../../inc/animation/LoaderLds-default";
export default {
  components: { LoaderLdsDefault, StatusAdmin },
  data() {
    return {
      loaded: false,
      user: {},
      occupations: [],
      categoryoccupations: [],
      taskuserassigns: {},
      annonceItem: {
        user: [],
        annonce: {
          occupation: [],
          categoryoccupation: [],
          city: []
        }
      },
      form: new Form({
        id: "",
        title: "",
        periode: "",
        description: ""
      })
    };
  },
  methods: {
    mydatatables() {
      $(function() {
        $("#datatables").DataTable({
          pagingType: "full_numbers",
          lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
          ],
          order: [
            [0, "asc"],
            [3, "desc"]
          ],
          responsive: true,
          destroy: true,
          retrieve: true,
          autoFill: true,
          colReorder: true,
          language: {
            search: "<i class='material-icons'>search</i>",
            searchPlaceholder: "Search Record"
          },
          sPaginationType: "full_numbers"
        });
      });
    },
    getColorCardUser() {
      return "card-header card-header-icon card-header-" + this.user.color_name;
    },
    getColorHeaderUser() {
      return "card-header card-header-" + this.user.color_name;
    },
    getColor(item) {
      return "badge badge-" + item.color_name;
    },
    getUser(item) {
      //Progress bar star
      this.$Progress.start();
      location.replace(`/dashboard/users/profile/${item.user.username}`);
      //Progres bar
      this.$Progress.finish();
    },
    viewItem(item) {
      //Masquer le modal après la création
      $("#viewNew").modal("show");
      //On passe les informations
      this.annonceItem = item;
    },

    deleteItem(id) {
      //Alert delete
      Swal.fire({
        title: "Delete Assignation?",
        text: "Are you sure you want to delete this assignation?",
        type: "warning",
        animation: false,
        customClass: "animated pulse",
        buttonsStyling: false,
        confirmButtonClass: "btn btn-success",
        cancelButtonClass: "btn btn-danger",
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        showCancelButton: true,
        reverseButtons: true
      }).then(result => {
        if (result.value) {
          //Start Progress bar
          this.$Progress.start();
          //Envoyer la requete au server
          let url = route("annonce_assigntaskdelete", id);
          dyaxios
            .delete(url)
            .then(() => {
              Fire.$emit("ItemGetter");
              /** Alert notify bootstrapp **/
              var notify = $.notify(
                "<strong>Please wait a moment</strong> ...",
                {
                  allow_dismiss: false,
                  showProgressbar: true
                }
              );
              setTimeout(function() {
                notify.update({
                  type: "success",
                  message: "<strong>Assignation deleted successfully.</strong>",
                  progress: 75
                });
              }, 2000);
              /* End alert ***/
              //End Progress bar
              this.$Progress.finish();
            })
            .catch(() => {
              this.$Progress.fail();
              //Alert error
              $.notify("Ooop! Something wrong. Try later", {
                type: "danger",
                animate: {
                  enter: "animated bounceInDown",
                  exit: "animated bounceOutUp"
                }
              });
            });
        }
      });
    },
    editItem(item) {
      //Masquer le modal après la création
      $("#editNew").modal("show");
      //On passe les informations
      this.form.fill(item);
    },

    updateItem() {
      //Start Progress bar
      this.$Progress.start();

      
       this.form.put(route('annonce_assigntaskupdate',[this.form.id]))
        .then(() => {
          //Masquer le modal après la création
          $("#editNew").modal("hide");

          /** Debut de l'alert **/
          var notify = $.notify("<strong>Please wait a moment</strong> ...", {
            allow_dismiss: false,
            showProgressbar: true
          });
          setTimeout(function() {
            notify.update({
              type: "success",
              message: "<strong>Task updated successfully.</strong>",
              progress: 75
            });
          }, 2000);
          /** Fin alert **/

          //End Progress bar
          this.$Progress.finish();

          //Event
          Fire.$emit("ItemGetter");
        })
        .catch(() => {
          //Failled message
          this.$Progress.fail();
          $.notify("Ooop! Something wrong. Try later", {
            type: "danger",
            animate: {
              enter: "animated bounceInDown",
              exit: "animated bounceOutUp"
            }
          });
        });
    },

    loadItems() {
      //Start Progress bar
      this.$Progress.start();
      axios.get(route("annonces_assigned_dashboard.api")).then(response => {
        this.loaded = true;
        this.taskuserassigns = response.data.data;
        this.mydatatables();
      });
      axios.get("/api/account/user").then(response => {
        this.user = response.data.data;
      });
      //End Progress bar
      this.$Progress.finish();
    },
    reload() {
      this.loadItems();
    }
  },
  created() {
    this.loadItems();
    Fire.$on("ItemGetter", () => {
      this.loadItems();
    });
  }
};
</script>

<style scoped>
</style>
