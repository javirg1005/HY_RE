import { ComponentFixture, TestBed } from '@angular/core/testing';

import { OfertastrabajoComponent } from './ofertastrabajo.component';

describe('OfertastrabajoComponent', () => {
  let component: OfertastrabajoComponent;
  let fixture: ComponentFixture<OfertastrabajoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ OfertastrabajoComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(OfertastrabajoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
