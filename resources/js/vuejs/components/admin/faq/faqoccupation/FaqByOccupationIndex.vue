<template>
  <div>
    <vue-progress-bar />
    <div class="main-panel">
      <top-nav></top-nav>
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
                    <i class="material-icons">forum</i>
                  </div>
                  <p class="card-category">
                    <b>All FAQs</b>
                  </p>
                  <h3 class="card-title" style="color:red;">
                    <b>{{faqbyoccupations.faqoccupations.length}}</b>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">forum</i>
                    <b>All FAQs</b>
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
                        <b>Datatables Faqs</b>
                      </h4>
                      <p class="card-title">Faqs Available</p>
                    </div>
                    <div class="col-md-6 text-right">
                      <span>
                        <i id="tooltipSize" class="material-icons">forum</i>
                      </span>
                    </div>
                  </div>
                </div>
                <br />
                <div class="card-body">
                  <div class="header text-right">
                    <router-link
                      :to="{ name: 'faqsoccupation.index' }"
                      id="button_hover"
                      class="btn btn-info btn-sm btn-raised"
                    >
                      <span class="btn-label">
                        <i class="material-icons">chevron_left</i>
                      </span>
                      <b class="title_hover">Back</b>
                    </router-link>
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
                  <div class="card-body">
                    <div class="toolbar">
                      <div class="submit text-center">
                        <router-link
                          v-if="$auth.can('create-faq')"
                          :to="{ name: 'faqsoccupation.create' }"
                          id="button_hover"
                          class="btn btn-success btn-raised"
                        >
                          <span class="btn-label">
                            <i class="material-icons">forum</i>
                          </span>
                          <b class="title_hover">New FAQS</b>
                        </router-link>
                      </div>
                    </div>
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
                              <b>Faq Title</b>
                            </th>
                            <th>
                              <b>Occupation name</b>
                            </th>
                            <th>
                              <b>Status</b>
                            </th>
                            <th>
                              <b>Edited By</b>
                            </th>
                            <th>
                              <b>Last Update</b>
                            </th>
                            <th class="disabled-sorting text-right">
                              <b>Actions</b>
                            </th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>
                              <b>Faq Title</b>
                            </th>
                            <th>
                              <b>Occupation name</b>
                            </th>
                            <th>
                              <b>Status</b>
                            </th>
                            <th>
                              <b>Edited By</b>
                            </th>
                            <th>
                              <b>Last Update</b>
                            </th>
                            <th class="disabled-sorting text-right">
                              <b>Actions</b>
                            </th>
                          </tr>
                        </tfoot>
                        <tbody>
                          <tr v-for="item in faqbyoccupations.faqoccupations" :key="item.id">
                            <td>{{ (item.title.length > 15 ? item.title.substring(0,15)+ "..." : item.title) | upText }}</td>
                            <td>
                              <b>
                                <router-link
                                  :to="{ name: 'faqs.occupationfaq', params: { occupation: item.occupation.slug  } }"
                                >
                                  <b>{{ (item.occupation.name.length > 15 ? item.occupation.name.substring(0,15)+ "..." : item.occupation.name) | upText }}</b>
                                </router-link>
                              </b>
                            </td>
                            <td>
                              <div class="timeline-heading">
                                <span v-if="item.status" class="badge badge-info">
                                  <b>Active</b>
                                </span>
                                <span v-else-if="!item.status" class="badge badge-danger">
                                  <b>Deactive</b>
                                </span>
                              </div>
                            </td>
                            <td>
                              <a
                                href="javascript:void(0)"
                                @click="getUser(item)"
                              >{{ (item.user.name.length > 15 ? item.user.name.substring(0,15)+ "..." : item.user.name) | upText }}</a>
                            </td>
                            <td>
                              <b>{{ item.updated_at | myDate }}</b>
                            </td>
                            <td class="td-actions text-right">
                              <button
                                v-if="$auth.can('edit-faq')"
                                type="button"
                                class="togglebutton btn btn-link btn-sm btn-sm"
                              >
                                <label>
                                  <input
                                    type="checkbox"
                                    name="status"
                                    v-model="item.status"
                                    @change="changeStatus(item)"
                                  />
                                  <span class="toggle" />
                                </label>
                              </button>
                              <button
                                type="button"
                                @click="viewItem(item)"
                                class="btn btn-link btn-warning btn-round btn-just-icon"
                                title="View"
                              >
                                <i class="material-icons">visibility</i>
                              </button>
                              <router-link
                                v-if="$auth.can('edit-faq')"
                                :to="{ path: `/dashboard/faqs_occupation/${item.id}/edit` }"
                                class="btn btn-link btn-success btn-round btn-just-icon"
                                title="Edit"
                              >
                                <i class="material-icons">edit</i>
                              </router-link>
                              <button
                                v-if="$auth.can('delete-faq')"
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

                    <!-- Modal création/édition faq -->
                    <div class="modal fade" id="viewNew" role="dialog" tabindex="-1">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="addNewLabel">
                              <span>
                                <b v-text="faqoccupationItem.occupation.name"></b>
                              </span>
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
                            <div id="accordion" role="tablist">
                              <div class="card card-collapse">
                                <div class="card-header" role="tab" id="headingOne">
                                  <h5 class="mb-0">
                                    <a
                                      data-toggle="collapse"
                                      href="#collapseOne"
                                      aria-expanded="true"
                                      aria-controls="collapseOne"
                                    >
                                      {{faqoccupationItem.title}}
                                      <i
                                        class="material-icons"
                                      >keyboard_arrow_down</i>
                                    </a>
                                  </h5>
                                </div>
                                <div
                                  id="collapseOne"
                                  class="collapse show"
                                  role="tabpanel"
                                  aria-labelledby="headingOne"
                                  data-parent="#accordion"
                                >
                                  <div class="card-body" v-html="faqoccupationItem.body"></div>
                                </div>
                              </div>
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
            </div>
          </div>
        </div>
      </div>
      <footer-admin></footer-admin>
    </div>
  </div>
</template>

<script>
import StatusAdmin from "../../../inc/admin/StatusAdmin";
import LoaderLdsDefault from "../../../inc/animation/LoaderLds-default";
export default {
  components: { LoaderLdsDefault, StatusAdmin },
  data() {
    return {
      loaded: false,
      editmode: false,
      user: {},
      faqbyoccupations: { faqoccupations: [] },
      faqoccupationItem: {
        occupation: ""
      }
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
    colorBage() {
      return "badge badge-" + this.faq.categoryfaq.color_name;
    },
    getColorCardUser() {
      return "card-header card-header-icon card-header-" + this.user.color_name;
    },
    getColorHeaderUser() {
      return "card-header card-header-" + this.user.color_name;
    },
    viewItem(item) {
      //Masquer le modal après la création
      $("#viewNew").modal("show");
      //On passe les information
      this.faqoccupationItem = item;
    },
    getUser(item) {
      //Progress bar star
      this.$Progress.start();
      location.replace(`/dashboard/users/p/${item.user.username}/`);
      //Progres bar
      this.$Progress.finish();
    },
    deleteItem(id) {
      //Alert delete
      Swal.fire({
        title: "Delete FAQs?",
        text: "Are you sure you want to delete this faq?",
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
          dyaxios
            .delete(route("faqs_occupation.destroy", [id]))
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
                  message: "<strong>FAQs deleted successfully.</strong>",
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

    /** Ici c'est pour changer le status **/
    changeStatus(item) {
      //Start Progress bar
      this.$Progress.start();
      dyaxios
        .get(route("faqs_occupation_status.occupationfaq", item.id), {
          status: item.status
        })
        .then(res => {
          $.notify("<strong>FAQ updated Successfully.</strong>", {
            allow_dismiss: false,
            type: "info",
            placement: {
              from: "bottom",
              align: "right"
            },
            animate: {
              enter: "animated fadeInRight",
              exit: "animated fadeOutRight"
            }
          });

          Fire.$emit("ItemGetter");
          //End Progress bar
          this.$Progress.finish();
        })
        .catch(() => {
          //Failled message
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
    },

    loadItems() {
      //Start Progress bar
      this.$Progress.start();
      let Slugitem = this.$route.params.occupation;
      axios.get(route(`api.faqoccupationslug`, [Slugitem])).then(response => {
        this.loaded = true;
        this.faqbyoccupations = response.data;
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
    },
    intervalFetchData: function() {
      setInterval(() => {
        this.loadItems();
      }, 120000);
    }
  },
  created() {
    this.loadItems();
    Fire.$on("ItemGetter", () => {
      this.loadItems();
    });
    this.intervalFetchData();
  }
};
</script>

<style scoped>
</style>
