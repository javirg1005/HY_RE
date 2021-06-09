import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from "@angular/forms";
import { HttpClient } from "@angular/common/http";

@Component({
  selector: 'app-ofertastrabajo',
  templateUrl: './ofertastrabajo.component.html',
  styleUrls: ['./ofertastrabajo.component.css']
})
export class OfertastrabajoComponent implements OnInit {
  
  title = 'image-gallery';
  public data: any = []
  page = 1;
  errors = null;
  filtroTForm: FormGroup

  constructor(private http: HttpClient, public fb: FormBuilder) { this.filtroTForm = this.fb.group({
    salario: []
  })}

  ngOnInit(): void {
    this.getData();
  }

  handlePageChange(event) {
    this.page = event;
  }
   
  getData() {
    const url = 'http://127.0.0.1:8000/api/empleos';
    this.http.get(url).subscribe((res) => {
      this.data = res
      console.log(this.data)
    })
  }

  onSubmit() {
    const url ='http://127.0.0.1:8000/api/empleo-filtro/' + this.filtroTForm.value.salario;
    console.log(url);
    this.http.get(url).subscribe((res) => {
        this.data = res
        console.log(this.data)
      },
      error => {
        this.errors = error.error;
      }
    )
  }

  getIDComponent(job){
    localStorage.setItem('id_empleo', job.getAttribute('data-job-id'));
  }

}
