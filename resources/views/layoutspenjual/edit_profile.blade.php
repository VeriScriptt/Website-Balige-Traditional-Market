  <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="editProfileModalLabel">Edit Profil</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form>
                      <!-- Form Group (username)-->
                      <div class="mb-3">
                          <label class="small mb-1" for="inputUsernameModal">Nama Toko</label>
                          <input class="form-control" id="inputUsernameModal" type="text"
                              placeholder="Nama Toko">
                      </div>
                      <div class="form-group">
                        <label for="editFoto">Foto</label>
                        <input type="file" class="form-control-file" id="editFoto">
                        <small id="editFotoHelp" class="form-text text-muted">Max. size 5MB</small>
                    </div>
                      <!-- Form Row-->
                      <div class="row gx-3 mb-3">
                          <!-- Form Group (first name)-->
                          <div class="col-md-12">
                              <label class="small mb-1" for="inputFirstNameModal">Nama Lengkap (Sesuai KTP / KK)</label>
                              <input class="form-control" id="inputFirstNameModal" type="text"
                                  placeholder="Nama Lengkap Anda">
                          </div>
                      </div>
                      <!-- Form Row        -->
                      <div class="row gx-3 mb-3">
                          <!-- Form Group (organization name)-->
                          <div class="col-md-3">
                              <label class="small mb-1" for="inputOrgNameModal">Nomor Kios</label>
                              <input class="form-control" id="inputOrgNameModal" type="text" placeholder="Nomor Kios">
                          </div>
                          <!-- Form Group (location)-->
                          <div class="col-md-3">
                              <label class="small mb-1" for="inputLocationModal">Lantai</label>
                              <select class="form-control" id="inputLocationModal">
                                  <option value="lantai1">Lantai 1</option>
                                  <option value="lantai2">Lantai 2</option>
                                  <option value="Balairung">Balairung</option>
                                  <!-- tambahkan opsi lainnya sesuai kebutuhan -->
                              </select>
                          </div>
                      </div>
                      <!-- Form Group (email address)-->
                      <div class="mb-3">
                          <label class="small mb-1" for="inputEmailAddressModal">Email</label>
                          <input class="form-control" id="inputEmailAddressModal" type="email"
                              placeholder="xyz123@xmail.com">
                      </div>
                      <!-- Form Row-->
                      <div class="row gx-3 mb-3">
                          <!-- Form Group (phone number)-->
                          <div class="col-md-6">
                              <label class="small mb-1" for="inputPhoneModal">Nomor Telepon</label>
                              <input class="form-control" id="inputPhoneModal" type="tel" placeholder="08xxxxxxxx">
                          </div>
                          <!-- Form Group (birthday)-->
                          <div class="col-md-6">
                              <label class="small mb-1" for="inputBirthdayModal">Tanggal Lahir</label>
                              <input class="form-control" id="inputBirthdayModal" type="text" name="birthday"
                                  placeholder="dd/mm/yyyy">
                          </div>
                      </div>
                      <!-- Save changes button-->
                      <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
