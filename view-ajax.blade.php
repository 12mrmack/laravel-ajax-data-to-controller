<form class="mt-5 white-form white-placeholder">
						<div class="field">
							<div class="field-sm">
								<input type="text" name="name" class="form-control" id="name" placeholder="NAME">
							</div>
							<div class="field-sm">
								<input type="email" name="email" class="form-control" id="email" placeholder="EMAIL">
							</div>
						</div>
						<div class="field">
							<div class="field-sm">
								<input type="text" name="phone" class="form-control" id="phone"  placeholder="PHONE">
							</div>
							<div class="field-sm">

								<select class="form-control" name="service" id="service">
									<option value="">SELECT SERVICE</option>
									@foreach($service_data as $ser)
									<option value="{{$ser->page_name}}">{{$ser->page_name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="field">
							<textarea class="form-control" name="message" id="message" rows="3" placeholder="MESSAGE"></textarea>
						</div>
						<div class="field mt-3">
							<button class="br-25" id="submit">Contact</button>
						</div>

					</form>

<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','#submit',function(e){
      e.preventDefault();
    var name = $('#name').val(),
        email = $('#email').val(),
        phone = $('#phone').val(),
        service = $('#service').val(),
        message = $('#message').val();

        if(name == ''){
          $('#name').removeClass('is-invalid');
          $('#name').addClass('is-invalid');
        } else {
          $('#name').removeClass('is-invalid');
        }
        if(email == ''){
          $('#email').removeClass('is-invalid');
          $('#email').addClass('is-invalid');
        } else {
          $('#email').removeClass('is-invalid');
        }
        if(phone == ''){
          $('#phone').removeClass('is-invalid');
          $('#phone').addClass('is-invalid');
        } else {
          $('#phone').removeClass('is-invalid');
        }
        if(service == ''){
          $('#service').removeClass('custom-select');
          $('#service').addClass('custom-select');
        } else {
          $('#service').removeClass('custom-select');
        }

      if(name != '' && email != '' && phone != '' && service != ''){
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
          }
        });
        $.ajax({  
            url: "{{url('contact_query')}}",
            type: "POST",
            data: {'name':name,'email':email,'phone':phone,'service':service,'message':message},
            success: function (result) {}  
          });
      }
    });
  });
</script>
