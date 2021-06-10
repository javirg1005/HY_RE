import { ComponentFixture, TestBed } from '@angular/core/testing';

import { OfertasCPComponent } from './ofertas-cp.component';

describe('OfertasCPComponent', () => {
  let component: OfertasCPComponent;
  let fixture: ComponentFixture<OfertasCPComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ OfertasCPComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(OfertasCPComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
