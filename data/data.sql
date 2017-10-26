declare @Counter int = 1

while @Counter<1000
    begin

    insert into php_reports (ColumnA,ColumnB,ColumnC,ColumnD)
    values (convert(int,round(rand()*1000,0)),
	   rand()*1000,
	   char(convert(int,round(rand()*10+65,0)))+
	   char(convert(int,round(rand()*10+65,0)))+
	   char(convert(int,round(rand()*10+65,0)))+
	   char(convert(int,round(rand()*10+65,0)))+
	   char(convert(int,round(rand()*10+65,0)))+
	   char(convert(int,round(rand()*10+65,0)))+
	   char(convert(int,round(rand()*10+65,0)))+
	   char(convert(int,round(rand()*10+65,0)))+
	   char(convert(int,round(rand()*10+65,0)))+
	   char(convert(int,round(rand()*10+65,0))),
	   dateadd(DAY,-1*convert(int,round(rand()*10,0)),getdate()))

    set @Counter=@Counter+1

    end;
