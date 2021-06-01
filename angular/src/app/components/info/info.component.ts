import { Component, OnInit } from '@angular/core';
import { HttpClient } from "@angular/common/http";
import { Observable } from 'rxjs';

@Component({
  selector: 'app-info',
  templateUrl: './info.component.html',
  styleUrls: ['./info.component.css']
})

export class InfoComponent implements OnInit {

  public data: any = [];

  constructor(private http: HttpClient) { }

  ngOnInit(): void {
    this.getData();
  }

  getData() {
    const url = 'http://127.0.0.1:8000/api/inmuebles/' + localStorage.getItem('id_casa');
    this.http.get(url).subscribe((res) => {
      this.data = res
      console.log(this.data)
    })
  }

  rellenar() {
    let id_usu = localStorage.getItem('id_usu');
    let id_inmueble = localStorage.getItem('id_casa');
    let fav = new Fav(id_usu, id_inmueble);
    this.addFav(fav);
  }

  addFav(fav: Fav): Observable <any> {
    console.log(fav);
    return this.http.post('http://127.0.0.1:8000/api/favs/addFav', fav);
  }

}

export class Fav {
  id_usu: string;
  id_inmueble: string;

  constructor(id_usu: string, id_inmueble: string) {
    this.id_usu = id_usu;
    this.id_inmueble = id_inmueble;
  }
}