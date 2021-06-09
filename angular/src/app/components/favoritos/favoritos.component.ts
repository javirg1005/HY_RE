import { Component, OnInit } from '@angular/core';
import { HttpClient } from "@angular/common/http";

@Component({
  selector: 'app-favoritos',
  templateUrl: './favoritos.component.html',
  styleUrls: ['./favoritos.component.css']
})
export class FavoritosComponent implements OnInit {

  title = 'image-gallery';
  public data: any = []
  public userId = 1;

  constructor(private http: HttpClient) { }

  ngOnInit(): void {
    this.getFavs();
  }
   
  getFavs() {
    const url = 'http://127.0.0.1:8000/api/favs/' + this.userId;
    this.http.get(url).subscribe((res) => {
      this.data = res
      console.log(this.data)
    })
  }
}
