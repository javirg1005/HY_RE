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
  public id: String;
  isFaved: boolean;

  constructor(private http: HttpClient) { }

  ngOnInit(): void {
    this.getData();
    this.checkFav();
    if (this.isFaved) {
      this.getId();
    }
  }

  getData() {
    const url1 = 'http://127.0.0.1:8000/api/inmuebles/' + localStorage.getItem('id_casa');
    this.http.get(url1).subscribe((res) => {
      this.data = res
      console.log(this.data)
    });
  }

  getId() {
    const url2 = 'http://127.0.0.1:8000/api/favs-id/' + localStorage.getItem('id_usu') + '/' + localStorage.getItem('id_casa');
    this.http.get(url2).subscribe(
      res => {
        this.id = res[0].id
        localStorage.setItem("id_fav", res[0].id);
        console.log(this.id)
      }
    );
  }

  rellenar() {
    let id_usu = localStorage.getItem('id_usu');
    let id_inmueble = localStorage.getItem('id_casa');
    let fav = new Fav(id_usu, id_inmueble);
    this.addFav(fav).subscribe(
      res => {
        console.log(res)
      }
    );
    this.checkFav();
    this.getId();
    //window.location.reload();
  }

  quitar() {
    this.http.delete('http://127.0.0.1:8000/api/favs/' + localStorage.getItem("id_fav")).subscribe(
      res => {
        console.log(res)
      }
    );
    localStorage.removeItem("id_fav");
    this.checkFav();
  }

  checkFav() {
    const url = 'http://127.0.0.1:8000/api/favs-isfav/' + localStorage.getItem('id_usu') + '/' + localStorage.getItem('id_casa');
    this.http.get(url).subscribe(
      res => {
        console.log(res);
        if (res == false) {
          this.isFaved = true;
        } else {
          this.isFaved = false;
        }
      }
    );
  }
  
  addFav(fav: Fav): Observable <any> {
    console.log(fav);
    return this.http.post('http://127.0.0.1:8000/api/favs-addFav', fav);
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