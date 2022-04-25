@extends('admin.master')

@section('content')
<div class="dashboard-wrapper">
	<div class="container-fluid dashboard-content">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="card">
					<h5 class="card-header">Tambah Iklan</h5>
					<div class="card-body">
						<form id="addcompany" method="POST" action="/admins/advertisement/proses" enctype="multipart/form-data">
							@csrf
							<div class="form-group row">
								<label class="col-12 col-sm-3 col-form-label text-sm-right">Posisi</label>
								<div class="col-12 col-sm-8 col-lg-6">
									<input name="position" id="position" type="text"  placeholder="Masukkan Nama Posisi" class="form-control @error('position') is-invalid @enderror" value="{{ old('position') }}">
									@error('position')
									<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="form-group row">
								<label class="col-12 col-sm-3 col-form-label text-sm-right">Waktu Kerja</label>
								<div class="col-12 col-sm-8 col-lg-6">
									<select name="classification" id="classification" class="form-control @error('classification') is-invalid @enderror">
										<option value="" selected disabled>Pilih Waktu Kerja</option>
										<option value="Fulltime">Full Time</option>
										<option value="Parttime">Part Time</option>
									</select>
									@error('classification')
									<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="form-group row">
								<label class="col-12 col-sm-3 col-form-label text-sm-right">Pengalaman <span>(tahun)</span></label>
								<div class="col-12 col-sm-8 col-lg-6">
									<input name="work_experience" id="work_experience" type="number"  placeholder="Masukkan Lama Pengalaman" class="form-control @error('work_experience') is-invalid @enderror" value="{{ old('work_experience') }}">
									@error('work_experience')
									<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Tingkatan</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <select name="education"
                                            class="form-control @error('education') is-invalid @enderror">
                                            <option value="" selected disabled>Pilih Tingkatan</option>
                                            <option value="sd">SD</option>
                                            <option value="smp">SMP</option>
                                            <option value="sma/smk">SMA/SMK</option>
                                            <option value="d1">D1</option>
                                            <option value="d2">D2</option>
                                            <option value="d3">D3</option>
                                            <option value="d4">D4</option>
                                            <option value="s1">S1</option>
                                        </select>
                                        @error('education')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                             </div>
                             <div class="form-group row">
								<label class="col-12 col-sm-3 col-form-label text-sm-right">Deskripsi Pekerjaan <span>(format list)</span></label>
								<div class="col-12 col-sm-8 col-lg-6">
									<textarea name="workdescription" id="editor-workdescription"  class="form-control @error('workdescription') is-invalid @enderror">{{ old('workdescription') }}</textarea>
									@error('workdescription')
									<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="form-group row">
								<label class="col-12 col-sm-3 col-form-label text-sm-right">Kualifikasi <span>(format list)</span></label>
								<div class="col-12 col-sm-8 col-lg-6">
									<textarea name="qualification" id="editor-qualification"  class="form-control @error('qualification') is-invalid @enderror">{{ old('qualification') }}</textarea>
									@error('qualification')
									<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="form-group row">
								<label class="col-12 col-sm-3 col-form-label text-sm-right">Gaji</label>
								<div class="col-12 col-sm-8 col-lg-6">
									<input name="salary" id="salary" type="number"  placeholder="Masukkan Gaji" class="form-control @error('salary') is-invalid @enderror" value="{{ old('salary') }}">
									@error('salary')
									<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="form-group row">
								<label class="col-12 col-sm-3 col-form-label text-sm-right">Dibutuhkan</label>
								<div class="col-12 col-sm-8 col-lg-6">
									<input name="needed" id="needed" type="number"  placeholder="Yang Dibutuhkan" class="form-control @error('needed') is-invalid @enderror" value="{{ old('needed') }}">
									@error('needed')
									<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="form-group row">
								<label class="col-12 col-sm-3 col-form-label text-sm-right">Mulai Tayang</label>
								<div class="col-12 col-sm-8 col-lg-6">
									<input name="start_at" id="start_at" type="date"  class="form-control datetimepicker-input @error('start_at') is-invalid @enderror" value="{{ old('start_at') }}">
									@error('start_at')
									<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="form-group row">
								<label class="col-12 col-sm-3 col-form-label text-sm-right">Selesai Tayang</label>
								<div class="col-12 col-sm-8 col-lg-6">
									<input name="end_at" id="end_at" type="date"  class="form-control datetimepicker-input @error('end_at') is-invalid @enderror" value="{{ old('end_at') }}">
									@error('end_at')
									<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="form-group row">
								<label class="col-12 col-sm-3 col-form-label text-sm-right">Tayang</label>
								<div class="col-12 col-sm-8 col-lg-6">
									<select name="show" id="show" class="form-control @error('show') is-invalid @enderror">
										<option value="" selected disabled>Pilih</option>
										<option value="0">Tidak</option>
										<option value="1">Ya</option>
									</select>
									@error('show')
									<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="form-group row">
								<label class="col-12 col-sm-3 col-form-label text-sm-right">Perusahaan</label>
								<div class="col-12 col-sm-8 col-lg-6">
									<select name="company_id" id="company_id" class="form-control @error('company_id') is-invalid @enderror">
										<option value="" selected disabled>Pilih Perusahaan</option>
										@foreach (App\Models\Company::select('id','name')->get() as $company)
										<option value="{{ $company->id }}" {{ ( $company->id == @$edit->company_id) ? 'selected' : '' }}> 
											{{ $company->name }} 
										</option>
										@endforeach
										@error('company_id')
										<span class="text-danger">{{ $message }}</span>
										@enderror
									</select>
								</div> 
							</div>
							<div class="form-group row text-right">
								<div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
									<button type="submit" class="btn btn-space btn-primary">Simpan</button>
									<button class="btn btn-space btn-secondary">Batal</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ckeditor -->
<script src="/vendor/ckeditor5/ckeditor.js"></script>

<!-- ckeditor - description, qualification -->
<script>
	ClassicEditor
	.create( document.querySelector( '#editor-qualification' ) )
	.then( editor => {
		console.log( editor );
	} )
	.catch( error => {
		console.error( error );
	} );

	ClassicEditor
	.create( document.querySelector( '#editor-workdescription' ) )
	.then( editor => {
		console.log( editor );
	} )
	.catch( error => {
		console.error( error );
	} );
</script>

@endsection