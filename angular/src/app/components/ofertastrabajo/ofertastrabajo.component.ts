import { Component, OnInit } from '@angular/core';
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

  constructor(private http: HttpClient) { }

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

  getIDComponent(job){
    localStorage.setItem('id_empleo', job.getAttribute('data-job-id'));
  }

}
