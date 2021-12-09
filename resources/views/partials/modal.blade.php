 <div class="modal-dialog" role="document">
     <div class="modal-content p-3">
         <div class="modal-header">
             <h5 class="modal-title-discount">Kode Diskon</h5>
             <h5 class="modal-title-reward">Point Reward</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <div class="modal-body">
             <form action="{{ route('coupon.apply') }}" class="d-flex" method="post">
                 @csrf

                <input type="text" class="discount__code" name="code" placeholder="Discount Code" required>
                @error('coupon')
                    {{ $message }}
                @enderror
                <button type="submit" class="discount__btn">TERAPKAN</button>
             </form>
         </div>
     </div>
 </div>
