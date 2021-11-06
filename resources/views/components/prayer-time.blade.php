<div class="prayer-time">
    <div class="container">
        <div class="prayer-date">
            <div>{{ 'WAKTU SHOLAT DI '.$lokasi }}</div>
            <div>{{ $tanggal_masehi }} • {{ $tanggal_hijriyah }}</div>
        </div>
        <div class="prayer-list">
            <ul>
                <li>
                    <div class="prayer-item">
                        <div>Subuh</div>
                        <div class="font-weight-bold">{{ $subuh ?? '00.00' }}</div>
                    </div>
                </li>
                <li>
                    <div class="prayer-item">
                        <div>Dhuha</div>
                        <div class="font-weight-bold">{{ $dhuha ?? '00.00' }}</div>
                    </div>
                </li>
                <li>
                    <div class="prayer-item">
                        <div>Dzuhur</div>
                        <div class="font-weight-bold">{{ $dzuhur ?? '00.00' }}</div>
                    </div>
                </li>
                <li>
                    <div class="prayer-item">
                        <div>Ashar</div>
                        <div class="font-weight-bold">{{ $ashar ?? '00.00' }}</div>
                    </div>
                </li>
                <li>
                    <div class="prayer-item">
                        <div>Magrib</div>
                        <div class="font-weight-bold">{{ $maghrib ?? '00.00' }}</div>
                    </div>
                </li>
                <li>
                    <div class="prayer-item">
                        <div>Isya</div>
                        <div class="font-weight-bold">{{ $isya ?? '00.00' }}</div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>