import { Component, OnInit } from '@angular/core';
import { HttpClient } from "@angular/common/http";
import { Observable } from 'rxjs';

@Component({
  selector: 'app-infojobs',
  templateUrl: './infojobs.component.html',
  styleUrls: ['./infojobs.component.css']
})

export class InfojobsComponent implements OnInit {
  public data: any = [];

  constructor(private http: HttpClient) { }

  ngOnInit(): void {
    this.getData();
  }

  getData() {
    const url = 'http://127.0.0.1:8000/api/empleos/' + localStorage.getItem('id_empleo');
    this.http.get(url).subscribe((res) => {
      this.data = res
      console.log(this.data)
    })
  }

  rellenar() {
    let id_usu = localStorage.getItem('id_usu');
    let id_inmueble = localStorage.getItem('id_empleo');
    let fav = new Favjob(id_usu, id_inmueble);
    this.addFav(fav);
  }

  addFav(fav: Favjob): Observable <any> {
    console.log(fav);
    return this.http.post('http://127.0.0.1:8000/api/favsjob-addFav', fav);
  }

}

export class Favjob {
  id_usu: string;
  id_job: string;

  constructor(id_usu: string, id_job: string) {
    this.id_usu = id_usu;
    this.id_job = id_job;
  }
}